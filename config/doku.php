<?php

return [

    /*
    |--------------------------------------------------------------------------
    | DOKU Integration Credentials.
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Client ID & Secret Key from DOKU Dashboard.
    |--------------------------------------------------------------------------
    */
    'client_id' => env('DOKU_CLIENT_ID', 'BRN-0296-1682766475573'),
    'secret_key' => env('DOKU_SECRET_KEY', 'SK-JGvA5xtoog9HAhu6w0Nj'),

    /*
    |--------------------------------------------------------------------------
    | DOKU API URL.
    |--------------------------------------------------------------------------
    */
    'sandbox_url' => env('DOKU_SANDBOX_URL', 'https://api-sandbox.doku.com'),
    'production_url' => env('DOKU_PRODUCTION_URL', 'https://api.doku.com'),

    /*
    |--------------------------------------------------------------------------
    | DOKU API Path, will be combined with DOKU API Base URL.
    | Example: https://api-sandbox.doku.com/checkout/v1/payment
    |--------------------------------------------------------------------------
    */
    'api_path' => env('DOKU_API_PATH', '/checkout/v1/payment'),
    'notification_path' => env('DOKU_NOTIFICATION_PATH', '/api/v1.0/payment/doku/notitication'),

    /*
    |--------------------------------------------------------------------------
    | DOKU Checkout expired time in minutes.
    |--------------------------------------------------------------------------
    */
    'checkout_expired' => env('DOKU_CHECKOUT_EXPIRED', 60),

    /*
    |--------------------------------------------------------------------------
    | DOKU switch mode.
    |--------------------------------------------------------------------------
    */
    'production' => env('DOKU_PRODUCTION', false),
];
