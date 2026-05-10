<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OneSignalService
{
    private $appId;
    private $apiKey;
    private $apiUrl = 'https://onesignal.com/api/v1/notifications';

    public function __construct()
    {
        $this->appId = config('services.onesignal.app_id');
        $this->apiKey = config('services.onesignal.api_key');
    }

    public function send(
        array $notification,
        array $filters = [],
        array $segments = [],
        array $externalIds = []
    ) {

        $payload = [
            'app_id' => $this->appId,

            'target_channel' => 'push',

            'contents' => [
                'en' => $notification['message'] ?? '',
                'ar' => $notification['message_ar'] ?? '',
            ],

            'headings' => [
                'en' => $notification['title'] ?? '',
                'ar' => $notification['title_ar'] ?? '',
            ],

            'content_available' => true,
            'small_icon' => 'ic_launcher',
        ];

        if (isset($notification['data'])) {
            $payload['data'] = $notification['data'];
        }

        // Targeting
        if (!empty($externalIds)) {

            $payload['include_aliases'] = [
                'external_id' => $externalIds
            ];

        } elseif (!empty($filters)) {

            $payload['filters'] = $filters;

        } elseif (!empty($segments)) {

            $payload['included_segments'] = $segments;

        } else {

            $payload['included_segments'] = ['Total Subscriptions'];
        }

        return $this->makeRequest($payload);
    }

    /**
     * Send To Clients
     */
    public function sendToClients(array $notification)
    {
        $filters = [
            [
                'field' => 'tag',
                'key' => 'Role',
                'relation' => '=',
                'value' => 'client'
            ]
        ];

        return $this->send($notification, $filters);
    }

    /**
     * Send To Sellers
     */
    public function sendToSellers(array $notification)
    {
        $filters = [
            [
                'field' => 'tag',
                'key' => 'Role',
                'relation' => '=',
                'value' => 'Seller'
            ]
        ];

        return $this->send($notification, $filters);
    }

    /**
     * Send To Specific User
     */
    public function sendToUser(array $notification, $userId)
    {
        $filters = [
            [
                'field' => 'tag',
                'key' => 'user_id',
                'relation' => '=',
                'value' => (string) $userId
            ]
        ];

        return $this->send($notification, $filters);
    }

    /**
     * HTTP Request
     */
    private function makeRequest(array $payload)
    {
        // LOG REQUEST
        Log::info('OneSignal Request', [
            'url' => $this->apiUrl,
            'payload' => $payload
        ]);

        try {

            $response = Http::withHeaders([
                'Authorization' => 'Basic ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ])->post($this->apiUrl, $payload);

            // LOG RESPONSE
            Log::info('OneSignal Response', [
                'status' => $response->status(),
                'body' => $response->json(),
            ]);

            return [
                'success' => $response->successful(),
                'status' => $response->status(),
                'response' => $response->json(),
            ];

        } catch (\Exception $e) {

            // LOG ERROR
            Log::error('OneSignal Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
}