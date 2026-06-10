<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OneSignalService
{
    private $appId;
    private $apiKey;

    public function __construct()
    {
        $this->appId = config('services.onesignal.app_id');
        $this->apiKey = config('services.onesignal.api_key');
        // $this->appId = config('services.onesignal.app_id');
        // $this->apiKey = config('services.onesignal.api_key');
    }

      public function send($title, $message, $data = [])
    {
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $this->apiKey,
            'Content-Type'  => 'application/json',
        ])->post('https://onesignal.com/api/v1/notifications', [
            'app_id' => $this->appId,
            'included_segments' => ['Total Subscriptions'],
            'contents'   => ['en' => $message],
            'headings'   => ['en' => $title],
            'data'       => $data,
        ]);
    
    return $response;
        // dd($response->json()); // <--- SHOW REAL ERROR
    }



}
