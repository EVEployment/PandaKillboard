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
        'scheme' => 'https',
    ],

    'eveonline' => [
        'esi_root' => env('EVEONLINE_ESI_ROOT', 'https://esi.evetech.net'),
        'client_id' => env('EVEONLINE_ESI_CLIENT_ID', null),
        'client_secret' => env('EVEONLINE_ESI_CLIENT_SECRET', null),
        'callback_url' => env('EVEONLINE_ESI_CALLBACK_URL', null),
        'tenant' => env('EVEONLINE_ESI_TENANT', 'tranquility'),

        'sso_root' => env('EVEONLINE_SSO_ROOT', 'https://login.eveonline.com'),

        'image_server' => env('EVEONLINE_ESI_IMAGE_SERVER', 'https://images.evetech.net'),
    ]

];
