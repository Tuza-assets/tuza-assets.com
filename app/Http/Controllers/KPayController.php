<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\PaymentRecords;
use App\Services\KPayService;
use Illuminate\Http\Request;

class KPayController extends Controller
{
    public function processPayment(Request $request, $id)
    {
        try {
            $invoice = Invoice::where('id', $id)
                ->where('user_id', auth()->user()->id)
                ->first();

            if ($invoice == null) {
                return redirect()->back()->with('error', 'Invoice not found');
            }

            if ($invoice?->pricing?->pricing_type == 'fixed') {
                $amount = $invoice?->pricing?->pricing_amount;
            } else {
                $amount = $invoice?->amount ?? 1;
            }

            // Display loading page
            return view('payments.kpay.loading', compact('invoice', 'amount'));

        } catch (\Throwable $th) {
            return redirect()
                ->route('payment.home')
                ->with('error', $th->getMessage() ?? 'Something went wrong.');
        }
    }

    public function initiatePayment(Request $request)
    {
        try {
            $invoice = Invoice::findOrFail($request->invoice_id);
            $amount = $request->amount;
            $phoneNumber = $request->phone_number;
            $network = $request->network;

            $refid = uniqid();
            $redirectUrl = route('transaction.payment.checkStatus', $refid);

            $data = [
                'action' => 'pay',
                'msisdn' => $phoneNumber,
                'details' => 'Tuza-assets',
                'refid' => $refid,
                'amount' => $amount,
                'currency' => $invoice?->pricing?->currency ?? 'RWF',
                'email' => auth()->user()->email,
                'cname' => auth()->user()->name,
                'cnumber' => rand(100000, 999999),
                'pmethod' => $network == 'mtn' ? 'momo' : 'airtel',
                'retailerid' => '01',
                'returl' => route('transaction.payment.callback'),
                'redirecturl' => $redirectUrl,
            ];

            $kpayService = new KPayService();
            $response = $kpayService->initiatePayment($data);

            if ($response['retcode'] == 0) {
                $PaymentRecords = new PaymentRecords();
                $PaymentRecords->reference_id = $response['refid'];
                $PaymentRecords->user_id = $invoice?->user?->id;
                $PaymentRecords->amount = $amount;
                $PaymentRecords->currency = $invoice?->pricing?->currency ?? 'RWF';
                $PaymentRecords->payment_method = $network;
                $PaymentRecords->payment_reason = $invoice?->service_type;
                $PaymentRecords->payment_status = 'pending';
                $PaymentRecords->thirdparty_reference_id = $response['refid'];
                $PaymentRecords->invoice_id = $invoice?->id;
                $PaymentRecords->save();

                return response()->json([
                    'success' => true,
                    'redirectUrl' => $redirectUrl
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Error occurred: ' . $response['reply']
                ]);
            }
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function checkStatus(Request $request, $refid)
    {
        $paymentRecord = PaymentRecords::where('reference_id', $refid)->first();

        if (!$paymentRecord) {
            return redirect()->route('payment.home')->with('error', 'Payment record not found');
        }

        // For now, just show the coming soon page
        // In a real implementation, you'd check the payment status from KPay service
        return view('payments.kpay.coming_soon');
    }

    public function callbackHandler(Request $request)
    {
        // Log the callback for debugging
        Log::info('KPay Callback received:', $request->all());

        $refid = $request->input('refid');
        $status = $request->input('status');

        $paymentRecord = PaymentRecords::where('reference_id', $refid)->first();

        if (!$paymentRecord) {
            return response()->json(['status' => 'error', 'message' => 'Payment record not found']);
        }

        if ($status == 'success') {
            $paymentRecord->payment_status = 'completed';
            $paymentRecord->save();

            $invoice = Invoice::find($paymentRecord->invoice_id);
            if ($invoice) {
                $invoice->status = 'paid';
                $invoice->save();

                // Handle any post-payment processing similar to PayPal success
                // This could be placed in a service class to avoid duplication
            }
        } else {
            $paymentRecord->payment_status = 'failed';
            $paymentRecord->save();
        }

        return response()->json(['status' => 'success']);
    }
}