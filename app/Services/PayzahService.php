<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PayzahService
{
    protected $apiUrl;
    protected $privateKey;

    public function __construct()
    {
        $this->apiUrl = config('services.payzah.api_url') ?? "https://development.payzah.net/ws/paymentgateway/index";
        $this->privateKey = base64_encode(config('services.payzah.private_key') ?? '');
    }

    public function initiatePayment($payload)
    {

        $response = Http::withHeaders([
            "Content-Type" => "application/json",
            "Authorization" => $this->privateKey
        ])->post($this->apiUrl, $payload);

        if (!$response->successful()) {
            return [
                'error' => true,
                'message' => 'Payment initiation failed',
                'response' => $response->json()
            ];
        }
        return $response->json();
    }

    public function verifyPayment($checkData)
    {
        try {
            $response = Http::withHeaders([
                "Content-Type" => "application/json",
                "Authorization" => $this->privateKey
            ])->post("https://development.payzah.net/ws/paymentgateway/get-payment-details", $checkData);


            if ($response->successful()) {
                return $response->json();
            } else {
                return [
                    'error' => true,
                    'message' => 'Failed to verify payment',
                    'status_code' => $response->status(),
                    'response' => $response->body()
                ];
            }
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }
}
