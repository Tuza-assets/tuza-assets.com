<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;
use Twilio\Rest\Client;
use App\Mail\CustomerConfirmation;

class BookingController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
            'email' => 'required|email',
        ]);

        $data = [
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'dates' => $request->input('dates'),
            'guest_count' => $request->input('guest_count'),
            'total' => $request->input('total'),
            'property_name' => $request->input('property_name'),
            'number_of_days' => $request->input('number_of_days'),
            'currency' => $request->input('currency'),
        ];

        Mail::to('tuzaassets@gmail.com')->send(new BookingConfirmation($data));
        Mail::to($data['email'])->send(new CustomerConfirmation($data));

        return redirect()->back()->with('success', 'Your booking request has been sent successfully!');
    }
}
