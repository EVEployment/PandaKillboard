<?php

return [
    'http_user_agent'            => 'Eseye Default Library',

    // Esi
    'datasource'                 => env('ESI_TENANT', 'tranquility'),
    'esi_scheme'                 => 'https',
    'esi_host'                   => 'esi.evetech.net',
    'esi_port'                   => 443,

    // Eve Online SSO
    'sso_scheme'                 => 'https',
    'sso_host'                   => 'login.eveonline.com',
    'sso_port'                   => 443,

    // Fetcher
    'fetcher'                    => \Seat\Eseye\Fetchers\GuzzleFetcher::class,

    // Logging
    'logger'                     => \Seat\Eseye\Log\NullLogger::class,
    'logger_level'               => 'info',
    'logfile_location'           => storage_path('eseye_logs/'),

    // Rotating Logger Details
    'log_max_files'              => 10,

    // Cache
    'cache'                      => \Seat\Eseye\Cache\NullCache::class,

    // File Cache
    'file_cache_location'        => storage_path('eseye_cache/'),

    // Redis Cache
    'redis_cache_location'       => 'tcp://127.0.0.1',
    'redis_cache_prefix'         => 'eseye:',

    // Memcached Cache
    'memcached_cache_host'       => '127.0.0.1',
    'memcached_cache_port'       => '11211',
    'memcached_cache_prefix'     => 'eseye:',
    'memcached_cache_compressed' => false,
];
