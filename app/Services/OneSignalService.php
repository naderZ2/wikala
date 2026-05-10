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
     * Send notification to all users or by segment
     *
     * @param array $notification Contains: title, title_ar, message, message_ar, data
     * @param array $filters OneSignal filter array for targeting specific users
     * @param array $segments OneSignal segments to target (alternative to filters)
     * @return array
     */
    public function send(array $notification, array $filters = [], array $segments = [])
    {
        $payload = [
            'app_id' => $this->appId,
            'isAndroid' => true,
            'isIos' => true,
            'content_available' => true,
            'small_icon' => 'ic_launcher-web',
            'contents' => [
                'en' => $notification['message'] ?? '',
                'ar' => $notification['message_ar'] ?? ''
            ],
            'headings' => [
                'en' => $notification['title'] ?? '',
                'ar' => $notification['title_ar'] ?? ''
            ],
        ];

        if (isset($notification['data'])) {
            $payload['data'] = $notification['data'];
        }

        if (!empty($filters)) {
            $payload['filters'] = $filters;
        } elseif (!empty($segments)) {
            $payload['included_segments'] = $segments;
        } else {
            $payload['included_segments'] = ['Total Subscriptions'];
        }

        return $this->makeRequest($payload);
    }

    /**
     * Send notification to clients only (Role = client)
     */
    public function sendToClients(array $notification)
    {
        $filters = [
            [
                'field' => 'tag',
                'key' => 'Role',
                'value' => 'client',
                'relation' => '='
            ]
        ];

        return $this->send($notification, $filters);
    }

    /**
     * Send notification to sellers only (Role = Seller)
     */
    public function sendToSellers(array $notification)
    {
        $filters = [
            [
                'field' => 'tag',
                'key' => 'Role',
                'value' => 'Seller',
                'relation' => '='
            ]
        ];

        return $this->send($notification, $filters);
    }

    /**
     * Send notification to specific seller
     */
    public function sendToSeller(array $notification, $sellerId)
    {
        $filters = [
            [
                'field' => 'tag',
                'key' => 'Role',
                'value' => 'Seller',
                'relation' => '='
            ],
            [
                'field' => 'tag',
                'key' => 'seller_id',
                'value' => (string)$sellerId,
                'relation' => '='
            ]
        ];

        return $this->send($notification, $filters);
    }

    /**
     * Send notification to specific user by ID
     */
    public function sendToUser(array $notification, $userId)
    {
        $filters = [
            [
                'field' => 'tag',
                'key' => 'user_id',
                'value' => (string)$userId,
                'relation' => '='
            ]
        ];

        return $this->send($notification, $filters);
    }

    /**
     * Send notification using player IDs (legacy method)
     */
    public function sendToPlayerIds(array $notification, array $playerIds)
    {
        $payload = [
            'app_id' => $this->appId,
            'isAndroid' => true,
            'isIos' => true,
            'content_available' => true,
            'small_icon' => 'ic_launcher-web',
            'contents' => [
                'en' => $notification['message'] ?? '',
                'ar' => $notification['message_ar'] ?? ''
            ],
            'headings' => [
                'en' => $notification['title'] ?? '',
                'ar' => $notification['title_ar'] ?? ''
            ],
            'include_player_ids' => $playerIds
        ];

        if (isset($notification['data'])) {
            $payload['data'] = $notification['data'];
        }

        return $this->makeRequest($payload);
    }

    /**
     * Make HTTP request to OneSignal API
     */
    private function makeRequest(array $payload)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json; charset=utf-8',
            'Authorization' => 'Basic ' . $this->apiKey,
        ])->post($this->apiUrl, $payload);

        return $response->json();
    }
}
