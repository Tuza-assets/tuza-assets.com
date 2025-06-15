<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;
use Exception;

class MailchimpService
{
    protected $client;

    public function __construct()
    {
        // Initialize the Mailchimp API client
        $this->client = new ApiClient();

        // Get Mailchimp API key and server prefix from configuration
        $apiKey = config('services.mailchimp.key');
        $serverPrefix = config('services.mailchimp.server_prefix');

        if (empty($apiKey) || empty($serverPrefix)) {
            throw new Exception('Mailchimp API key or server prefix is missing.');
        }

        // Set the configuration for the Mailchimp client
        $this->client->setConfig([
            'apiKey' => $apiKey,
            'server' => $serverPrefix,
        ]);
    }


    public function subscribe(string $email, string $name = '')
    {
        // Get the Mailchimp list ID from configuration
        $listId = config('services.mailchimp.list_id');
        
        if (empty($listId)) {
            throw new Exception('Mailchimp list ID is missing.');
        }

        try {
            // Add the subscriber to the list
            return $this->client->lists->addListMember($listId, [
                'email_address' => $email,
                'status' => 'subscribed', // You can change the status to 'pending' if double opt-in is required
                'merge_fields' => [
                    'FNAME' => $name,
                ],
            ]);
        } catch (Exception $e) {
            throw new Exception('Error subscribing user: ' . $e->getMessage());
        }
    }
}
