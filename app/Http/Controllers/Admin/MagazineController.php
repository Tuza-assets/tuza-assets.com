<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Magazine;
use App\Models\MagazineDownload;
use Illuminate\Support\Facades\Mail;


class MagazineController extends Controller
{
    public function index()
    {
    $magazines = Magazine::all();
    $magazineDownloads = MagazineDownload::with('magazine')->get();
    return view('admin.magazine.index', compact('magazines', 'magazineDownloads'));
    }

public function destroy2($id)
{
    $download = MagazineDownload::find($id);
    if ($download) {
        $download->delete();
        return back()->with('success', 'Download record deleted successfully!');
    }
    return back()->withErrors(['error' => 'Download record not found.']);
}

    public function create()
    {
        return view('admin.magazine.create');
    }

    public function store(Request $request)
        {
            $request->validate([
                'title' => 'required|string|max:255',
                'document' => 'required|file|mimes:pdf,doc,docx',
            ]);
        
            $documentPath = $request->file('document')->store('magazines');
        
            $magazine = Magazine::create([
                'title' => $request->title,
                'document' => $documentPath,
            ]);
        
            // Retrieve all subscribed emails
            $subscribers = MagazineDownload::where('subscribed', true)->pluck('email');
        
            // Prepare the email data
            $documentLink = asset('public/'.$documentPath);
            $emailData = [
                'title' => $request->title,
                'documentLink' => $documentLink,
            ];
        
            // Send email to each subscriber
            foreach ($subscribers as $subscriber) {
                try {
                    Mail::send('admin.magazine.new_magazine_notification', $emailData, function ($message) use ($subscriber, $emailData) {
                        $message->to($subscriber)
                                ->subject('New Magazine Available: ' . $emailData['title']);
                    });
                } catch (\Exception $e) {
                    \Log::error('Failed to send email to ' . $subscriber . ': ' . $e->getMessage());
                }
            }
        
            return redirect()->route('admin.magazine')->with('success', 'Magazine created and emails sent successfully.');
        }



    public function edit(Magazine $magazine)
    {
        return view('admin.magazine.edit', compact('magazine'));
    }

    public function update(Request $request, Magazine $magazine)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'document' => 'nullable|file|mimes:pdf,doc,docx',
        ]);
        try {
            if ($request->hasFile('document')) {
                $documentPath = $request->file('document')->store('magazines');
            } else {
                $documentPath = $magazine->document;
            }
            $magazine->update([
                'title' => $request->title,
                'document' => $documentPath,
            ]);
            return redirect()->route('admin.magazine')->with('success', 'Magazine updated successfully.');
            
        } catch (\Exception $e) {
            \Log::error('Failed to update magazine: ' . $e->getMessage());
            return redirect()->back()->withErrors('Failed to update the magazine.');
        }
    }


    public function destroy(Magazine $magazine)
    {
        Storage::delete($magazine->document);
        $magazine->delete();
        return redirect()->route('admin.magazine')->with('success', 'Magazine deleted successfully.');
    }


    public function sendDownloadLink(Request $request, Magazine $magazine)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Save the download request to the database
        MagazineDownload::create([
            'magazine_id' => $magazine->id,
            'name' => $request->name,
            'email' => $request->email,
            'subscribed'=>$request->subscribed,
        ]);

        // Prepare the email data
        $documentLink = asset('public/'.$magazine->document);

        $emailData = [
            'name' => $request->name,
            'email' => $request->email,
            'documentLink' => $documentLink,
        ];

        // Send email
        try {
            Mail::send('admin.magazine.download_link', $emailData, function ($message) use ($emailData) {
                $message->to($emailData['email'])
                        ->subject('Your Download Link');
            });
            return back()->with('success', 'Download link sent to your email!');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Failed to send email. Please try again later.']);
        }
    }
    
    
    
}
