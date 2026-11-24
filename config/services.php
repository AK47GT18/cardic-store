<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Resend, Postmark, AWS, and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'paychangu' => [
        'secret_key' => env('PAYCHANGU_SECRET_KEY'),
        'base_url' => env('PAYCHANGU_BASE_URL', 'https://api.paychangu.com'),
        'mode' => env('PAYCHANGU_MODE', 'test'),
    ],

    'reloadly' => [
        'client_id' => env('RELOADLY_CLIENT_ID', env('API_client_ID')),
        'client_secret' => env('RELOADLY_CLIENT_SECRET', env('API_client_secret')),
        'env' => env('RELOADLY_ENV', 'sandbox'),
    ],

    'admin' => [
        'email' => env('MAIL_ADMIN_ADDRESS', 'websmtp47@gmail.com'),
    ],

];
