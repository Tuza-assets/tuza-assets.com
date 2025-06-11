<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use MailchimpMarketing\ApiClient;

class MailchimpController extends Controller
{
    public function subscribe(Request $request)
    {
        // Debug statement to check if the route is working
        // dd('Route is working! Form data:', $request->all());
        
        // Validate the form input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);
        
        try {
            // Initialize the Mailchimp API client directly in the controller
            $client = new ApiClient();
            
            // Get Mailchimp API key and server prefix from configuration
            // Get Mailchimp API key and server prefix from configuration
            $apiKey = 'e208e9147c5487d3055af7b7ae3837bb-us12';
            $serverPrefix = 'us12';
            $listId = 'ac55ae3053';
            
            if (empty($apiKey) || empty($serverPrefix) || empty($listId)) {
                throw new \Exception('Mailchimp configuration is missing.');
            }
            
            // Set the configuration for the Mailchimp client
            $client->setConfig([
                'apiKey' => $apiKey,
                'server' => $serverPrefix,
            ]);
            
            // Add the subscriber to the list
            $client->lists->addListMember($listId, [
                'email_address' => $request->email,
                'status' => 'subscribed',
                'merge_fields' => [
                    'FNAME' => $request->name,
                ],
            ]);
            
            // Return with success message
            return back()->with('success', 'You\'ve been subscribed!');
        } catch (\Exception $e) {
            // Return with error message if subscription fails
            return back()->with('error', 'Subscription failed: ' . $e->getMessage());
        }
    }
}