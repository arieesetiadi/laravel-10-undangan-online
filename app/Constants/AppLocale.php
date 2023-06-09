<?php

namespace App\Constants;

class AppLocale
{
    /**
     * ID locale value.
     *
     * @var string
     */
    public const ID = 'id';

    /**
     * EN locale value.
     *
     * @var string
     */
    public const EN = 'en';

    /**
     * Get all the locale value.
     *
     * @return array
     */
    public static function values()
    {
        return [
            self::ID,
            self::EN,
        ];
    }

    /**
     * Get all the string version of the locale.
     *
     * @return array
     */
    public static function labels()
    {
        return [
            self::ID => 'ID',
            self::EN => 'EN',
        ];
    }

    /**
     * Get the string version base on const value.
     *
     * @param  string  $key
     * @return string
     */
    public static function label($key)
    {
        return self::labels()[$key];
    }
}
