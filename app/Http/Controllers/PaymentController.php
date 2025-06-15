<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    protected $apiUrl = 'https://pay.esicia.com'; // Removed trailing slash

    public function process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'msisdn' => 'required|string',
            'amount' => 'required|numeric|min:100',
            'currency' => 'required|in:RWF,USD',
            'pmethod' => 'required|in:momo,card',
            'details' => 'required|string|max:500',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Phone number validation and formatting
        $phone = $request->msisdn;
        if (substr(preg_replace('/[^0-9]/', '', $phone), 0, 4) == '2507' && strlen($phone) == 12) {
            $phone = $phone;
            $rightphone = true;
        } else {
            if (substr(preg_replace('/[^0-9]/', '', $phone), 0, 2) == '07' && strlen($phone) == 10) {
                $phone = '25' . $phone;
                $rightphone = true;
            } else {
                $rightphone = false;
            }
        }

        if (!$rightphone) {
            return back()->with('error', 'Invalid phone number format. Please use format: 07XX or 2507XX')->withInput();
        }

        // Generate unique reference ID
        $refid = time() . rand(100, 999) . rand(1000, 9999);

        // Set default parameters
        $bankid = $request->pmethod == 'momo' ? '63510' : '000';

        $payload = [
            'action' => 'pay',
            'msisdn' => $phone,
            'details' => $request->details,
            'refid' => $refid,
            'amount' => (int)$request->amount,
            'currency' => $request->currency,
            'email' => $request->email,
            'cname' => $request->cname,
            'cnumber' => $phone,
            'pmethod' => $request->pmethod,
            'retailerid' => '01',
            'returl' => route('payment.callback'),
            'redirecturl' => route('payment.success'),
            'bankid' => $bankid
        ];

        try {
            $json_data = json_encode($payload);

            $ch = curl_init('https://pay.esicia.com');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_USERPWD, 'tuza:9Wud4i');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                throw new \Exception(curl_error($ch));
            }

            $result = json_decode($response, true);
            curl_close($ch);

            // Remove dd() for production
            //  dd($result);

            if (isset($result['success']) && $result['success'] == 1) {
                // Store payment details in session for status checking
                session(['payment_refid' => $refid]);

                // Determine payment status based on API response
                $paymentStatus = 'pending'; // Default status

                // Check different possible status indicators from the API
                if (isset($result['Status'])) {
                    $paymentStatus = $result['Status'];
                } elseif (isset($result['status'])) {
                    $paymentStatus = $result['status'];
                } elseif (isset($result['retcode'])) {
                    // Map retcode to status
                    switch ($result['retcode']) {
                        case 3:
                            $paymentStatus = 'pending';
                            break;
                        case 1:
                            $paymentStatus = 'completed';
                            break;
                        case 2:
                            $paymentStatus = 'failed';
                            break;
                        default:
                            $paymentStatus = 'pending';
                    }
                }

                // Store payment in database
                Payment::create([
                    'reference_id' => $refid,
                    'amount' => $request->amount,
                    'payment_method' => $request->pmethod,
                    'payment_status' => $paymentStatus, // Now uses the determined status
                    'customer_name' => $request->cname,
                    'customer_email' => $request->email,
                    'customer_phone' => $phone,
                    'currency' => $request->currency,
                    'details' => $request->details,
                    'user_id' => auth()->id() ?? null,
                    'created_by' => auth()->id() ?? null,
                ]);

                // Log successful payment initiation
                Log::info('Payment initiated successfully:', [
                    'refid' => $refid,
                    'tid' => $result['tid'] ?? null,
                    'status' => $paymentStatus
                ]);

                return redirect()->back()->with('success', 'Payment initiated successfully. Please check your phone for the payment status.');
            }

            // Log the error response for debugging
            Log::error('Payment initiation failed:', $result);

            $errorMessage = isset($result['reply']) ? $result['reply'] : 'Payment initiation failed';
            return back()->with('error', 'Payment initiation failed: ' . $errorMessage)->withInput();

        } catch (\Exception $e) {
            Log::error('Payment processing error: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while processing your payment. Please try again.')->withInput();
        }
    }

    public function checkStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'refid' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $refid = $request->refid;

        try {
            $payload = [
                'action' => 'checkstatus',
                'refid' => $refid
            ];

            $json_data = json_encode($payload);

            $ch = curl_init($this->apiUrl);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_USERPWD, 'tuza:9Wud4i'); // Keep original credentials
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                throw new \Exception(curl_error($ch));
            }

            $result = json_decode($response, true);
            curl_close($ch);

            // Log the response for debugging
            Log::info('K-Pay Status Check Response: ', $result);

            // Determine status message
            $statusMessage = '';
            $statusClass = '';

            if (isset($result['statusid'])) {
                switch ($result['statusid']) {
                    case '01':
                        $statusMessage = 'Payment completed successfully';
                        $statusClass = 'success';

                        // Update database status
                        Payment::where('reference_id', $refid)->update([
                            'payment_status' => 'completed',
                            'thirdparty_reference_id' => $result['tid'] ?? null
                        ]);
                        break;
                    case '02':
                        $statusMessage = 'Payment failed: ' . ($result['statusmsg'] ?? 'Unknown error');
                        $statusClass = 'error';

                        // Update database status
                        Payment::where('reference_id', $refid)->update([
                            'payment_status' => 'failed',
                            'thirdparty_reference_id' => $result['tid'] ?? null
                        ]);
                        break;
                    default:
                        $statusMessage = 'Payment status: ' . ($result['statusdesc'] ?? 'Unknown status');
                        $statusClass = 'info';
                        break;
                }
            } else {
                $statusMessage = 'Unable to determine payment status';
                $statusClass = 'error';
            }

            return back()->with($statusClass, $statusMessage)->with('status_data', $result);

        } catch (\Exception $e) {
            Log::error('Payment status check error: ' . $e->getMessage());
            return back()->with('error', 'Failed to check payment status. Please try again.');
        }
    }

    public function callback(Request $request)
    {
        Log::info('Payment callback received:', $request->all());

        // Validate the callback data
        if (!$request->has(['tid', 'refid', 'statusid'])) {
            return response()->json(['error' => 'Invalid callback data'], 400);
        }

        // Process the callback based on status
        $status = $request->statusid;
        $refid = $request->refid;
        $tid = $request->tid;

        // Update payment status in database
        Payment::where('reference_id', $refid)->update([
            'payment_status' => $status == '01' ? 'completed' : 'failed',
            'thirdparty_reference_id' => $tid,
            'callback_data' => json_encode($request->all()),
            'updated_at' => now()
        ]);

        return response()->json([
            'tid' => $tid,
            'refid' => $refid,
            'reply' => 'OK'
        ]);
    }

    public function success(Request $request)
    {
        $refid = $request->get('refid') ?? session('payment_refid');
        $payment = null;

        if ($refid) {
            $payment = Payment::where('reference_id', $refid)->first();
        }

        return view('payment.success', compact('payment', 'refid'));
    }
}