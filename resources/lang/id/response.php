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
            'inactive' => 'Akun tidak aktif.',
        ],
        'login' => [
            'success' => 'Token autentikasi berhasil dibuat.',
        ],
        'logout' => [
            'success' => 'Token autentikasi berhasil dihapus.',
        ],
    ],
    'payment' => [
        'checkout' => [
            'success' => 'Checkout pembayaran berhasil dibuat.',
        ],
        'payment_gateway' => [
            'invalid' => 'Payment gateway tidak valid.',
        ],
    ],
    'administrators' => [
        'get_all' => [
            'success' => 'Data administrators berhasil diterima.',
        ],
        'get' => [
            'success' => 'Data administrator berhasil diterima.',
            'not_found' => 'Data administrator tidak ditemukan.',
        ],
    ],
];
