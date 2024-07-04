<?php
namespace App\Http\Controllers;

class Msg91
{
     protected $apiKey;
     protected $httpClient;

     public function __construct()
     {
          // Get Msg91 API key from environment variables
          $this->apiKey = env('MSG91_API_KEY');

          // Initialize Guzzle HTTP client
          $this->httpClient = new Client([
               'base_uri' => 'https://api.msg91.com', // Base URI for Msg91 API
               'timeout' => 10, // Timeout in seconds
               'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $this->apiKey, // Use Bearer token for authorization
               ],
          ]);
     }

     public function sendSMS($phoneNumber, $message)
     {
          // Prepare the payload
          $payload = [
               'sender' => '9163567970', // Your sender ID
               'route' => '4', // Transactional route
               'country' => '91', // Country code (India)
               'sms' => [
                    [
                         'message' => $message,
                         'to' => [$phoneNumber],
                    ],
               ],
          ];

          try {
               // Send HTTP POST request to Msg91 API
               $response = $this->httpClient->post('/api/v2/sendsms', [
                    'json' => $payload,
               ]);

               // Get response body
               $responseData = json_decode($response->getBody(), true);

               // Check if SMS was sent successfully
               if ($responseData['type'] == 'success') {
                    return true; // SMS sent successfully
               } else {
                    // Log error or handle failure
                    return false;
               }
          } catch (\Exception $e) {
               // Log error or handle exception
               return false;
          }
     }
}
