<?php

namespace App\Constants;

class PaymentGateway
{
    /**
     * DOKU payment gateway value.
     *
     * @var string
     */
    public const DOKU = 'DOKU';

    /**
     * Xendit payment gateway value.
     *
     * @var string
     */
    public const XENDIT = 'XENDIT';

    /**
     * Midtrans payment gateway value.
     *
     * @var string
     */
    public const MID_TRANS = 'MID_TRANS';

    /**
     * Get all the slug version of the payment gateway.
     *
     * @return array
     */
    public static function slugs()
    {
        return [
            self::DOKU => 'doku',
            self::XENDIT => 'xendit',
            self::MID_TRANS => 'mid-trans',
        ];
    }

    /**
     * Get the slug version base on key value.
     *
     * @param  string  $key
     * @return string
     */
    public static function slug($key)
    {
        return self::slugs()[$key];
    }
}
