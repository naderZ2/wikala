<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

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

    /**
     * Base Send Method
     */
    public function send(
        array $notification,
        array $filters = [],
        array $segments = [],
        array $externalIds = []
    ) {
        $payload = [
            'app_id' => $this->appId,

            // Required for new OneSignal
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

        // Extra Data
        if (isset($notification['data'])) {
            $payload['data'] = $notification['data'];
        }

        /**
         * Priority:
         * 1- External IDs
         * 2- Filters
         * 3- Segments
         * 4- All Users
         */

        // Send to external IDs
        if (!empty($externalIds)) {

            $payload['include_aliases'] = [
                'external_id' => $externalIds
            ];

        }

        // Send using filters/tags
        elseif (!empty($filters)) {

            $payload['filters'] = $filters;

        }

        // Send using segments
        elseif (!empty($segments)) {

            $payload['included_segments'] = $segments;

        }

        // Send to all
        else {

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
     * Send To Specific Seller
     */
    public function sendToSeller(array $notification, $sellerId)
    {
        $filters = [
            [
                'field' => 'tag',
                'key' => 'Role',
                'relation' => '=',
                'value' => 'Seller'
            ],

            [
                'operator' => 'AND'
            ],

            [
                'field' => 'tag',
                'key' => 'seller_id',
                'relation' => '=',
                'value' => (string) $sellerId
            ]
        ];

        return $this->send($notification, $filters);
    }

    /**
     * Send To Specific User By Tag
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
     * Send To User Using External ID (BEST METHOD)
     */
    public function sendToExternalUser(array $notification, $userId)
    {
        return $this->send(
            $notification,
            [],
            [],
            [(string) $userId]
        );
    }

    /**
     * Legacy Player IDs
     */
    public function sendToPlayerIds(array $notification, array $playerIds)
    {
        $payload = [
            'app_id' => $this->appId,

            'target_channel' => 'push',

            'include_player_ids' => $playerIds,

            'contents' => [
                'en' => $notification['message'] ?? '',
                'ar' => $notification['message_ar'] ?? ''
            ],

            'headings' => [
                'en' => $notification['title'] ?? '',
                'ar' => $notification['title_ar'] ?? ''
            ],

            'content_available' => true,
            'small_icon' => 'ic_launcher',
        ];

        if (isset($notification['data'])) {
            $payload['data'] = $notification['data'];
        }

        return $this->makeRequest($payload);
    }

    /**
     * HTTP Request
     */
    private function makeRequest(array $payload)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ])->post($this->apiUrl, $payload);

        return [
            'success' => $response->successful(),
            'status' => $response->status(),
            'response' => $response->json(),
        ];
    }
}