<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Reservation;
use App\Models\PaymentRecords;
use App\Models\User;
use App\Notifications\Property\PaymentCompletedNotification;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
public function processTransaction(Request $request, $id)
{
    try {
        // Get reservation data from session instead of database
        $reservationData = session('reservation');
        
        if (!$reservationData) {
            return redirect()->back()->with('error', 'Reservation data not found in session');
        }
        
        // Use the session data values
        $amount = $reservationData['total'] ?? 1;
        $propertyName = $reservationData['property_name'] ?? 'Property';
        $currency = $reservationData['currency'] ?? 'Frw';
        
        // Convert to USD if needed using rate from .env
        if ($currency != 'USD') {
            $rate = env('USD_CONVERSION_RATE', 1416.00);
            $amount = $amount / $rate;
        }
        $newAmount = round($amount, 2);

        $currency = 'USD';
        $payment_method = 'Paypal';

        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => route('payment.successTransaction'),
                'cancel_url' => route('payment.cancelTransaction'),
            ],
            'purchase_units' => [
                0 => [
                    'amount' => [
                        'currency_code' => $currency,
                        'value' => $newAmount,
                    ],
                    'description' => 'Booking for ' . $propertyName,
                ],
            ],
        ]);
        
        if (isset($response['id']) && $response['id'] != null) {
            // Store the reservation data and payment info in session
            session(['paypal_payment_id' => $response['id']]);
            session(['property_id' => $reservationData['property_id']]);
            session(['payment_amount_usd' => $newAmount]);
            
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            
            return redirect()
                ->to('property/payment')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->to('property/payment')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    } catch (\Throwable $th) {
        return redirect()
            ->to('property/payment')
            ->with('error', $th->getMessage() ?? 'Something went wrong.');
    }
}

public function successTransaction(Request $request)
{
    try {
        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            // Get reservation data from session
            $reservationData = session('reservation');
            $paypalPaymentId = session('paypal_payment_id');
            $propertyId = session('property_id');
            $paymentAmountUsd = session('payment_amount_usd');
            
            if (!$reservationData) {
                return redirect()->route('payment.home')->with('error', 'Reservation data not found in session.');
            }
            
            // Create the reservation in the database
            $reservation = new Reservation();
            $reservation->property_id = $propertyId;
            $reservation->user_id = null; // Will be updated later if user registers/logs in
            $reservation->property_name = $reservationData['property_name'];
            $reservation->check_in = $reservationData['check_in'];
            $reservation->check_out = $reservationData['check_out'];
            $reservation->guest_count = $reservationData['guest_count'];
            $reservation->totalAmount = $reservationData['total'];
            $reservation->currency = $reservationData['currency'];
            $reservation->status = 'confirmed';
            $reservation->payment_status = 'paid';
            $reservation->special_requests = $reservationData['special_requests'] ?? null;
            $reservation->first_name = $reservationData['first_name'];
            $reservation->last_name = $reservationData['last_name'];
            $reservation->email = $reservationData['email'];
            $reservation->phone_number = $reservationData['phone_number'];
            $reservation->paypal_transaction_id = $paypalPaymentId;
            $reservation->payment_amount_usd = $paymentAmountUsd;
            $reservation->save();

            // Get the property for notification
            $property = Property::find($propertyId);
            
            // Notify property owner about successful payment
            if ($property && $property->user) {
                $property->user->notify(new PaymentCompletedNotification($reservation, $property));
            }

            // Store reservation ID in session for confirmation page
            session(['confirmed_reservation_id' => $reservation->id]);
            
            // Clear other reservation-related session data
            session()->forget(['reservation', 'paypal_payment_id', 'property_id', 'payment_amount_usd']);

            return redirect()
                ->route('reservation.confirmation')
                ->with('success', 'Payment completed successfully. Your booking is confirmed!');
        } else {
            return redirect()
                ->route('payment.home')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    } catch (\Throwable $th) {
        return redirect()
            ->route('payment.home')
            ->with('error', $th->getMessage() ?? 'Something went wrong.');
    }
}

    public function cancelTransaction(Request $request)
    {
       return redirect()
        ->to('property/payment')
            ->with('error', 'You have canceled the transaction.');
    }
}