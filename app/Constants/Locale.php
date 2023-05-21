<?php

namespace App\Constants;

class Locale
{
    /**
     * General locale value.
     *
     * @var int
     */
    const ID = 'id';
    const EN = 'en';

    /**
     * Get all the locale value.
     *
     * @return array $values
     */
    public static function values()
    {
        $values = [
            self::ID,
            self::EN,
        ];

        return $values;
    }

    /**
     * Get all the string version of the locale.
     *
     * @return array $labels
     */
    public static function labels()
    {
        $labels = [
            self::ID => 'ID',
            self::EN => 'EN',
        ];

        return $labels;
    }

    /**
     * Get the string version base on const value.
     *
     * @param string $key
     * @return string $label
     */
    public static function label($key)
    {
        $labels = self::labels();
        $label = $labels[$key];

        return $label;
    }
}
