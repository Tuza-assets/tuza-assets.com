<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class IremboPayService
{
    public $baseUrl = "https://api.sandbox.irembopay.com/payments";
    public $secretKey = "sk_live_2634fd8bad9444b39ef4785477aca60f";

    public function createInvoice(array $data)
    {
        $url = "{$this->baseUrl}/invoices";

        try {
            $response = Http::withOptions([
                'verify' => false, // Disable SSL verification for development
                'timeout' => 30,
            ])->withHeaders([
                'irembopay-secretkey' => $this->secretKey,
                'X-API-Version' => '2',
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->post($url, $data);

            Log::info('IremboPay API Response', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            if ($response->successful()) {
                return [
                    'success' => true,
                    'data' => $response->json('data'),
                ];
            }

            return [
                'success' => false,
                'errors' => $response->json('errors'),
                'message' => $response->json('message'),
                'status_code' => $response->status(),
            ];
        } catch (\Exception $e) {
            Log::error('IremboPay Invoice Creation Failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return [
                'success' => false,
                'errors' => ['detail' => $e->getMessage()],
                'message' => 'Failed to create invoice.',
            ];
        }
    }

    /**
     * Verify an invoice.
     *
     * @param string $invoiceId
     * @return array
     */
    public function verifyInvoice(string $invoiceId)
    {
        $url = "{$this->baseUrl}/invoices/{$invoiceId}";

        try {
            $response = Http::withOptions([
                'verify' => false, // Disable SSL verification for development
                'timeout' => 30,
            ])->withHeaders([
                'irembopay-secretkey' => $this->secretKey,
                'X-API-Version' => '2',
                'Accept' => 'application/json',
            ])->get($url);

            Log::info('IremboPay Verify Response', [
                'invoice_id' => $invoiceId,
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            if ($response->successful()) {
                return [
                    'success' => true,
                    'data' => $response->json('data'),
                ];
            }

            return [
                'success' => false,
                'errors' => $response->json('errors'),
                'message' => $response->json('message'),
                'status_code' => $response->status(),
            ];
        } catch (\Exception $e) {
            Log::error('IremboPay Invoice Verification Failed', [
                'invoice_id' => $invoiceId,
                'error' => $e->getMessage(),
            ]);

            return [
                'success' => false,
                'errors' => ['detail' => $e->getMessage()],
                'message' => 'Failed to verify invoice.',
            ];
        }
    }

    /**
     * Handle payment notification.
     *
     * @param array $notificationData
     * @return bool
     */
    public function handlePaymentNotification(array $notificationData)
    {
        try {
            Log::info('IremboPay Payment Notification Received', $notificationData);

            // Add your notification handling logic here
            // For example, update payment status in database

            return true;
        } catch (\Exception $e) {
            Log::error('IremboPay Notification Handling Failed', [
                'error' => $e->getMessage(),
                'notification_data' => $notificationData
            ]);

            return false;
        }
    }
}
