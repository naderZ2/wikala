<?php

namespace App\Traits;

use App\Models\AboutUs;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

trait SendSmsTrait
{


    public function sendSmsWhatsApp($phone, $otp)
    {
        // Log::info("sendSmsWhatsApp:-" .$phone );

        $message ="your OTP is :- $otp";
        $url = 'https://app.arrivewhats.com/api/send';
        $data = AboutUs::whereId(1)->first();
        $params = [
            'query' => [
                'number' => $phone,
                'type' => 'text',
                'message' => $message,
                'instance_id' => $data->instance_id,
                'access_token' => $data->access_token,
            ],
        ];

        $client = new Client();
        $promise = $client->getAsync($url, $params);

        try {
            $response = $promise->wait(); // Block until the request is complete
            $responseData = json_decode($response->getBody(), true);

            // Log::info('WhatsApp OTP sent successfully.', ['response' => $responseData]);

            return [
                'success' => true,
                'data' => $responseData,
            ];
        } catch (\Throwable $exception) {
            Log::error('Failed to send WhatsApp OTP.', ['error' => $exception->getMessage()]);
                // Log::info("sendOtpAsync:success"  );

            return [
                'success' => false,
                'error' => $exception->getMessage(),
            ];
        }
    }


}
