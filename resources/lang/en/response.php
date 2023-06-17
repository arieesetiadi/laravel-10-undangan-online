<?php
return [

    /*
    |--------------------------------------------------------------------------
    | API Response Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during response for API Controller
    | messages that we need to display to the front-end developer. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'auth' => [
        'account' => [
            'inactive' => 'Account is inactive.'
        ],
        'login' => [
            'success' => 'Auth token generated successfully.',
        ],
        'logout' => [
            'success' => 'Auth token deleted successfully.',
        ],
    ],
    'payment' => [
        'checkout' => [
            'success' => 'Payment checkout generated successfully.',
        ],
        'payment_gateway' => [
            'invalid' => 'Invalid payment gateway.',
        ],
    ],
    'administrators' => [
        'get_all' => [
            'success' => 'Administrators data retrieved successfully.',
        ],
        'get' => [
            'success' => 'Administrator data retrieved successfully.',
        ],
    ],
];
