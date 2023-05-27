<?php

namespace App\Constants;

class PaymentGateway
{
    /**
     * General payment gateway value.
     *
     * @var int
     */
    public const DOKU = 'DOKU';

    public const XENDIT = 'XENDIT';

    public const MID_TRANS = 'MID_TRANS';

    /**
     * Get all the slug version of the payment gateway.
     *
     * @return array $slugs
     */
    public static function slugs()
    {
        $slugs = [
            self::DOKU => 'doku',
            self::XENDIT => 'xendit',
            self::MID_TRANS => 'mid-trans',
        ];

        return $slugs;
    }

    /**
     * Get the slug version base on int value.
     *
     * @param  int  $key
     * @return string $slug
     */
    public static function slug($key)
    {
        $slugs = self::slugs();
        $slug = $slugs[$key];

        return $slug;
    }
}
