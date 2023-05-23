<?php

namespace App\Constants;

class SwalButton
{
    /**
     * Available button text for sweet alert.
     *
     * @var string
     */
    const OK = 'OK';

    /**
     * Get all the string version of the status.
     *
     * @return array $labels
     */
    public static function labels()
    {
        $labels = [
            self::OK => 'OK',
        ];

        return $labels;
    }

    /**
     * Get the string version base on int value.
     *
     * @param  int  $key
     * @return string $label
     */
    public static function label($key)
    {
        $labels = self::labels();
        $label = $labels[$key];

        return $label;
    }
}
