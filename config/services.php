<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'driver' => env('SESSION_DRIVER', 'file'),

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],
    'onesignal' => [
        'app_id' => env('ONESIGNAL_APP_ID'),
        'api_key' => env('ONESIGNAL_API_KEY'),
    ],


    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => "1377788370073359",
        'client_secret' => "bd3ee5510fc6ce970fc94a56e1800d13",
        'redirect' => "https://127.0.0.1:8000/facebook/callback",
    ],

    'google' => [
        'client_id'     => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect'      => env('GOOGLE_REDIRECT_URL', 'http://127.0.0.1:8000/login/google/callback'),
    ],

    'icarry' => [
        'base_url' => env('ICARRY_BASE_URL', 'https://test.icarry.com/api-frontend'),
        'email' => env('ICARRY_EMAIL'),
        'password' => env('ICARRY_PASSWORD'),
        'pickup_location' => env('ICARRY_PICKUP_LOCATION'),      // global fallback warehouse name
        'cod_currency' => env('ICARRY_COD_CURRENCY', 'KWD'),
        'default_country' => env('ICARRY_DEFAULT_COUNTRY', 'Kuwait'),
    ],

];
