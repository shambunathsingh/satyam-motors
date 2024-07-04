<?php

namespace App\Services;

use GuzzleHttp\Client;

class MSG91Service
{
    protected $client;
    protected $authKey;
    protected $senderId;

    public function __construct()
    {
        $this->client = new Client();
        $this->authKey = config('services.msg91.auth_key');
        $this->senderId = config('services.msg91.sender_id');
    }

    public function sendOTP($mobile, $templateId)
    {
        $otpEndpoint = 'https://api.msg91.com/api/v5/otp';
        $response = $this->client->post($otpEndpoint, [
            'form_params' => [
                'authkey' => $this->authKey,
                'template_id' => $templateId,
                'mobile' => $mobile,
            ],
        ]);

        return $response->getBody()->getContents();
    }
}
