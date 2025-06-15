<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class ReservationController extends Controller
{
    public function showReservationPage(Request $request, $id)
    {
        // Get query parameters for reservation details
        $checkInDate = $request->query('check_in');
        $checkOutDate = $request->query('check_out');
        $guestCount = $request->query('guests');
        
        // Get cleaning and service fees from query parameters
        $cleaningFee = $request->query('cleaning_fee');
        $serviceFee = $request->query('service_fee');
        
        // Remove any formatting (commas, etc.) and convert to float
        $cleaningFee = floatval(str_replace(',', '', $cleaningFee));
        $serviceFee = floatval(str_replace(',', '', $serviceFee));
        
        // If fees are not provided in URL, fetch them from API
        if (!$cleaningFee || !$serviceFee) {
            try {
                $feeResponse = Http::get("https://property.tuza-assets.com/api/v1/fee");
                if ($feeResponse->successful()) {
                    $feeData = $feeResponse->json();
                    $baseCleaningFee = floatval($feeData['cleaning_fee'] ?? 0);
                    $baseServiceFee = floatval($feeData['service_fee'] ?? 0);
                    
                    // Apply calculation based on guest count
                    $guestCount = intval($guestCount) ?: 1;
                    $cleaningFee = $baseCleaningFee * $guestCount;
                    $serviceFee = $baseServiceFee * $guestCount;
                }
            } catch (\Exception $e) {
                // Fallback to default values if API fails
                $cleaningFee = 10000;
                $serviceFee = 15000;
            }
        }
        
        // Fetch property data from API
        $response = Http::get("https://property.tuza-assets.com/api/v1/properties/{$id}");
        
        if (!$response->successful()) {
            return redirect()->back()->with('error', 'Property not found');
        }
        
        $property = $response->json();
        
        // Get the max unit (same logic as in your original code)
        $maxUnit = collect($property['available_units'])->sortByDesc('rent')->first();
        
        // Calculate fees and totals
        $rentPerMonth = intval($maxUnit['rent'] ?? 0);
        $currency = $maxUnit['currency'] ?? 'Frw';
        
        // Calculate month difference
        $months = 1;
        if ($checkInDate && $checkOutDate) {
            $startDate = new \DateTime($checkInDate);
            $endDate = new \DateTime($checkOutDate);
            $interval = $startDate->diff($endDate);
            $months = ceil($interval->days / 30);
            $months = max(1, $months);
        }
        
        $subtotal = $rentPerMonth * $months;
        $totalAmount = $subtotal + $cleaningFee + $serviceFee;
        
        return view('reservation.booking', compact(
            'property', 
            'checkInDate', 
            'checkOutDate', 
            'guestCount', 
            'rentPerMonth',
            'currency',
            'cleaningFee',
            'serviceFee',
            'months',
            'subtotal',
            'totalAmount'
        ));
    }

    public function completeReservation(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'property_name' => 'required|string',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'guest_count' => 'required|integer',
            'total' => 'required|numeric',
            'currency' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'special_requests' => 'nullable|string',
            'property_id' => 'required|string',
            'cleaning_fee' => 'required|numeric',  // Add validation for cleaning fee
            'service_fee' => 'required|numeric',   // Add validation for service fee
        ]);
        
        // Store reservation data in session for the payment page
        session()->put('reservation', $validated);
        
        // Redirect to payment page
        return redirect()->route('reservation.payment');
    }
    
    public function showPaymentPage()
    {
        // Get reservation data from session
        $reservation = session('reservation');
        
        // If no reservation data is found, redirect back to properties
        if (!$reservation) {
            return redirect()->route('properties.index')->with('error', 'No reservation data found');
        }
        
        // Calculate dates and fees for display
        $checkInDate = Carbon::parse($reservation['check_in']);
        $checkOutDate = Carbon::parse($reservation['check_out']);
        $months = $checkInDate->diffInMonths($checkOutDate);
        if ($months < 1) $months = 1;
        
        // Use the values from the reservation data
        $totalAmount = $reservation['total'];
        $cleaningFee = $reservation['cleaning_fee'];
        $serviceFee = $reservation['service_fee'];
        $subtotal = $totalAmount - $cleaningFee - $serviceFee;
        $rentPerMonth = round($subtotal / $months);
        
        return view('reservation.payment', compact(
            'reservation',
            'checkInDate',
            'checkOutDate',
            'months',
            'totalAmount',
            'cleaningFee',
            'serviceFee',
            'subtotal',
            'rentPerMonth'
        ));
    }
    
    public function processPayment(Request $request)
    {
        // Validate payment method
        $validated = $request->validate([
            'paymentMethod' => 'required|in:paypal,kpay',
            'choosenetwork' => 'required_if:paymentMethod,kpay|in:mtn,airtel',
            'phoneNumber' => 'required_if:paymentMethod,kpay|nullable|string',
        ]);
        
        // Get reservation data from session
        $reservation = session('reservation');
        
        if (!$reservation) {
            return redirect()->route('properties.index')->with('error', 'No reservation data found');
        }
        
        if ($request->paymentMethod == 'paypal') {
            // Redirect to PayPal processing
            return redirect()->route('payment.complete', ['id' => $reservation['property_id']]);
        }
        
        // Process payment based on selected method
        // This would connect to your payment gateway
        // For now, we'll just simulate a successful payment
        
        // Store the payment method information with reservation
        $paymentInfo = array_merge($reservation, [
            'payment_method' => $validated['paymentMethod'],
            'network' => $validated['choosenetwork'] ?? null,
            'payment_phone' => $validated['phoneNumber'] ?? null,
        ]);
        
        // You would typically store this in your database
        // $booking = Booking::create($paymentInfo);
        
        // For demo purposes, we'll keep it in the session
        session()->put('completed_reservation', $paymentInfo);
        session()->forget('reservation');
        
        // Redirect to confirmation page
        return redirect()->route('reservation.confirmation')->with('success', 'Your payment was successful!');
    }
    
    public function showConfirmation()
    {
        // Get the completed reservation from session
        $booking = session('completed_reservation');
        
        if (!$booking) {
            return redirect()->route('properties.index')->with('error', 'No booking information found');
        }
        
        return view('reservation.confirmation', compact('booking'));
    }
}