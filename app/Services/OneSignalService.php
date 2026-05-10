<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OneSignalService
{
    private string $appId;
    private string $apiKey;

    // NEW ONESIGNAL API URL
    private string $apiUrl = 'https://api.onesignal.com/notifications';

    public function __construct()
    {
        $this->appId = config('services.onesignal.app_id');
        $this->apiKey = config('services.onesignal.api_key');
    }

    /**
     * Main Send Method
     */
    public function send(
        array $notification,
        array $filters = [],
        array $segments = [],
        array $externalIds = []
    ) {

        $payload = [
            'app_id' => $this->appId,

            // REQUIRED
            'target_channel' => 'push',

            // TITLE
            'headings' => [
                'en' => $notification['title'] ?? '',
                'ar' => $notification['title_ar'] ?? '',
            ],

            // MESSAGE
            'contents' => [
                'en' => $notification['message'] ?? '',
                'ar' => $notification['message_ar'] ?? '',
            ],

            // OPTIONAL
            'content_available' => true,
            'small_icon' => 'ic_launcher',
        ];

        /**
         * EXTRA DATA
         */
        if (!empty($notification['data'])) {
            $payload['data'] = $notification['data'];
        }

        /**
         * TARGETING
         */

        // EXTERNAL IDS (BEST METHOD)
        if (!empty($externalIds)) {

            $payload['include_aliases'] = [
                'external_id' => $externalIds
            ];

        }

        // FILTERS / TAGS
        elseif (!empty($filters)) {

            $payload['filters'] = $filters;

        }

        // SEGMENTS
        elseif (!empty($segments)) {

            $payload['included_segments'] = $segments;

        }

        // SEND TO ALL
        else {

            $payload['included_segments'] = ['Total Subscriptions'];
        }

        return $this->makeRequest($payload);
    }

    /**
     * SEND TO CLIENTS
     */
    public function sendToClients(array $notification)
    {
        $filters = [
            [
                'field' => 'tag',
                'key' => 'Role',
                'relation' => '=',
                'value' => 'client',
            ]
        ];

        return $this->send($notification, $filters);
    }

    /**
     * SEND TO SELLERS
     */
    public function sendToSellers(array $notification)
    {
        $filters = [
            [
                'field' => 'tag',
                'key' => 'Role',
                'relation' => '=',
                'value' => 'Seller',
            ]
        ];

        return $this->send($notification, $filters);
    }

    /**
     * SEND TO SPECIFIC USER USING TAG
     */
    public function sendToUser(array $notification, $userId)
    {
        $filters = [
            [
                'field' => 'tag',
                'key' => 'user_id',
                'relation' => '=',
                'value' => (string) $userId,
            ]
        ];

        return $this->send($notification, $filters);
    }

    /**
     * SEND TO SPECIFIC USER USING EXTERNAL ID
     * BEST & FASTEST METHOD
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
     * SEND TO SPECIFIC SELLER
     */
    public function sendToSeller(array $notification, $sellerId)
    {
        $filters = [

            [
                'field' => 'tag',
                'key' => 'Role',
                'relation' => '=',
                'value' => 'Seller',
            ],

            [
                'operator' => 'AND'
            ],

            [
                'field' => 'tag',
                'key' => 'seller_id',
                'relation' => '=',
                'value' => (string) $sellerId,
            ],
        ];

        return $this->send($notification, $filters);
    }

    /**
     * LEGACY PLAYER IDS
     */
    public function sendToPlayerIds(array $notification, array $playerIds)
    {

        $payload = [

            'app_id' => $this->appId,

            'target_channel' => 'push',

            'include_player_ids' => $playerIds,

            'headings' => [
                'en' => $notification['title'] ?? '',
                'ar' => $notification['title_ar'] ?? '',
            ],

            'contents' => [
                'en' => $notification['message'] ?? '',
                'ar' => $notification['message_ar'] ?? '',
            ],

            'content_available' => true,
            'small_icon' => 'ic_launcher',
        ];

        if (!empty($notification['data'])) {
            $payload['data'] = $notification['data'];
        }

        return $this->makeRequest($payload);
    }

    /**
     * MAKE HTTP REQUEST
     */
    private function makeRequest(array $payload)
    {

        /**
         * LOG REQUEST
         */
        Log::info('OneSignal Request', [
            'url' => $this->apiUrl,
            'payload' => $payload,
        ]);
        Log::info('OneSignal API KEY', [
            'key' => $this->apiKey
        ]);
        try {

            $response = Http::withHeaders([
                'accept'        => 'application/json',
                'Authorization' => 'Bearer ' . $this->apiKey,
            ])->asJson()->post($this->apiUrl, $payload);

            /**
             * LOG RESPONSE
             */
            Log::info('OneSignal Response', [
                'status' => $response->status(),
                'body' => $response->json(),
            ]);

            return [

                'success' => $response->successful(),

                'status' => $response->status(),

                'response' => $response->json(),
            ];

        } catch (\Throwable $e) {

            /**
             * LOG ERROR
             */
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