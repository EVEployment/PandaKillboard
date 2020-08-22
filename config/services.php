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
    ],

    'eveonline' => [
        'root' => env('ESI_ROOT', 'https://esi.evetech.net'),
        'client_id' => env('ESI_CLIENT_ID', null),
        'client_secret' => env('ESI_CLIENT_SECRET', null),
        'callback_url' => env('ESI_CALLBACK_URL', null),
        'tenant' => env('ESI_TENANT', 'tranquility'),

        'image_server' => env('ESI_IMAGE_SERVER', 'https://images.evetech.net'),
    ]

];
