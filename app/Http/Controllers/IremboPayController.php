<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\IremboPayService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\Payment;
use App\Models\User;

class IremboPayController extends Controller
{
    public function iremboPayment(Request $request, IremboPayService $iremboPayService)
    {
        $amountToPay = $request->amount ?? 1000; // Default amount or get from request
        $transactionId = substr(rand(0, time()), 0, 7);
        $user = Auth::guard('web')->user();

        $data = [
            "transactionId" => $transactionId,
            "paymentAccountIdentifier" => "BKIGRWRW",
            "customer" => [
                "email" => $user->email ?? "default@gmail.com",
                "phoneNumber" => $user->phone ?? "0780000001",
                "name" => $user->name
            ],
            "paymentItems" => [
                [
                    "unitAmount" => $amountToPay,
                    "quantity" => 1,
                    "code" => "PC-2aac5139fb"
                ]
            ],
            "description" => "Property booking payment",
            "expiryAt" => Carbon::now()->addMinutes(5)->toIso8601String(),
            "language" => "EN"
        ];

        try {
            $response = $iremboPayService->createInvoice($data);
            if ($response['success']) {
                // Create payment record
                $payment = Payment::create([
                    'reference_id' => $response['data']['invoiceNumber'],
                    'amount' => $amountToPay,
                    'currency' => 'RWF',
                    'payment_method' => 'irembo_pay',
                    'payment_status' => 'pending',
                    'customer_name' => $user->name,
                    'customer_email' => $user->email,
                    'customer_phone' => $user->phone,
                    'user_id' => $user->id,
                    'created_by' => $user->id,
                    'details' => [
                        'transaction_id' => $transactionId,
                        'payment_link' => $response['data']['paymentLinkUrl'] ?? null
                    ]
                ]);

                if ($payment) {
                    session()->put('invoiceNumber', $response['data']['invoiceNumber']);
                    session()->put('payment_id', $payment->id);
                    return redirect()->route('irembo.payment.initialization');
                } else {
                    return redirect()->back()->with('error', 'Failed to create payment record');
                }
            } else {
                Log::error('IremboPay invoice creation failed', $response);
                return redirect()->back()->with('error', 'Failed to create payment invoice');
            }
        } catch (\Throwable $th) {
            dd('IremboPay payment error', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', 'Payment processing error');
        }
    }

    public function iremboPaymentInitialization()
    {
        $invoiceNumber = session()->get('invoiceNumber');
        if (!$invoiceNumber) {
            return redirect()->back()->with('error', 'No payment session found');
        }

        return view('payments.irembo.initialization', compact('invoiceNumber'));
    }

    public function iremboPaymentCallback(Request $request, IremboPayService $iremboPayService)
    {
        $invoiceNumber = session()->get('invoiceNumber');
        $paymentId = session()->get('payment_id');

        if (!$invoiceNumber || !$paymentId) {
            return redirect()->back()->with('error', 'Invalid payment session');
        }

        $response = $iremboPayService->verifyInvoice($invoiceNumber);
        $user = Auth::guard('web')->user();

        if (!$response['success']) {
            return redirect()->route('home')->with('error', 'Payment verification failed');
        }

        if ($response['data']['paymentStatus'] == 'NEW') {
            session()->put('invoiceNumber', $response['data']['invoiceNumber']);
            return redirect()->route('irembo.payment.initialization');
        }

        if ($response['data']['paymentStatus'] == 'PAID') {
            $payment = Payment::where('reference_id', $response['data']['invoiceNumber'])
                             ->where('user_id', $user->id)
                             ->first();

            if (!$payment) {
                return redirect()->back()->with('error', 'Payment record not found');
            }

            $payment->payment_status = 'success';
            $payment->callback_data = $response['data'];
            $payment->save();

            // Clear session
            session()->forget(['invoiceNumber', 'payment_id']);

            // Send confirmation email
            try {
                $this->sendPaymentConfirmationEmail($user, $payment);
            } catch (\Exception $e) {
                Log::error('Failed to send payment confirmation email', ['error' => $e->getMessage()]);
            }

            return redirect()->route('dashboard')->with('success', 'Payment completed successfully');
        } else {
            $payment = Payment::where('reference_id', $response['data']['invoiceNumber'])
                             ->where('user_id', $user->id)
                             ->first();

            if ($payment) {
                $payment->payment_status = 'failed';
                $payment->callback_data = $response['data'];
                $payment->save();
            }

            session()->forget(['invoiceNumber', 'payment_id']);
            return redirect()->back()->with('error', 'Payment failed or was cancelled');
        }
    }

    private function sendPaymentConfirmationEmail($user, $payment)
    {
        $subject = 'Payment Confirmation - Tuza Assets';
        $message = "Dear {$user->name},\n\n";
        $message .= "Your payment of {$payment->currency} {$payment->amount} has been received successfully.\n";
        $message .= "Transaction ID: {$payment->reference_id}\n";
        $message .= "Payment Method: IremboPay\n\n";
        $message .= "Thank you for choosing Tuza Assets.\n\n";
        $message .= "Best regards,\nTuza Assets Team";

        Mail::raw($message, function ($mail) use ($user, $subject) {
            $mail->to($user->email)
                 ->subject($subject);
        });
    }
}
