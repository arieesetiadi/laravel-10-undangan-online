<?php

namespace App\Constants;

class Locale
{
    /**
     * General locale value.
     *
     * @var int
     */
    const EN = 'en';
    const ID = 'id';

    /**
     * Get all the locale value.
     *
     * @return array $values
     */
    public static function values()
    {
        $values = [
            self::EN,
            self::ID,
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
            self::EN => 'English',
            self::ID => 'Bahasa',
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
