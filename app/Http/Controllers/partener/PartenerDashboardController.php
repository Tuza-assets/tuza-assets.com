<?php

namespace App\Http\Controllers\partener;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Payment;

class PartenerDashboardController extends Controller
{
    public function index()
    {
        $partner = Auth::user();
        $latestPayment = Payment::where('user_id', $partner->id)
                                ->orderByDesc('created_at')
                                ->first();

        $isPaymentValid = false;

        if ($latestPayment && $latestPayment->amount >= 1000) {
            // Convert payment date to Kigali timezone
            $paymentDate = Carbon::parse($latestPayment->created_at)->timezone('Africa/Kigali');
            $now = now()->timezone('Africa/Kigali');

            $daysDiff = $paymentDate->diffInDays($now);

            // Set validity condition
            $isPaymentValid = $daysDiff < 30;
        }

        if (!$isPaymentValid) {
            return view('partner.dashboard-payment');
        } else {
            return view('partner.dashboard');
        }
    }
}
