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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    // 'facebook' => [
    //     'client_id' => "305634685107598",
    //     'client_secret' => "2d43cd4c7c6ec825700535b79f0cc9ed",
    //     'redirect' => "http://localhost:8000/facebook/callback",
    // ],

    'google' => [
        'client_id'     => "682438700043-vohk56av2315iga3rs6nfirqtid6vhin.apps.googleusercontent.com",
        'client_secret' => "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",
        "redirect" =>"http://127.0.0.1:8000/login/google/callback"
    ],

];
