<?php

return [

    'paths' => [
        'api/*',
        'sanctum/csrf-cookie',
        'auth/*', // <— include this if your routes are like /auth/register
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'http://localhost:5175',
        'http://127.0.0.1:5175',
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],





    'supports_credentials' => true, // <— This is required for Sanctum
];
