<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VisitController extends Controller
{
      public function scheduleVisit(Request $request)
    {
        $validatedData = $request->validate([
            'visitorName' => 'required|string|max:255',
            'visitorEmail' => 'required|email|max:255',
            'visitorPhone' => 'required|string|max:20',
            'visitDate' => 'required|date',
            'property_code' => 'required|string|max:255',
        ]);
       
        $data = [
            'name' => $request->input('visitorName'),
            'email' => $request->input('visitorEmail'),
            'phone' => $request->input('visitorPhone'),
            'date' => $request->input('visitDate'),
            'property_code' => $request->input('property_code'),
        ];

        Mail::send('emails.schedule_visit', $data, function ($message) {
            $message->to('info@tuza-assets.com', '')
                    ->subject('Visit Schedule Request');
        });

        Mail::send('emails.thank_you', $data, function ($message) use ($data) {
            $message->to($data['email'], $data['name'])
                    ->subject('Thank You for Scheduling a Visit');
        });

        return back()->with('success', 'Your visit has been scheduled and a confirmation email has been sent to you!');
    }
}
