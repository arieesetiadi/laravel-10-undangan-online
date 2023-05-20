<?php

namespace App\Constants;

class OAuthDriver
{
    /**
     * OAuth driver value.
     *
     * @var string
     */
    const GOOGLE = 'google';

    /**
     * Get all the string version of the value.
     *
     * @return array $labels
     */
    public static function labels()
    {
        $labels = [
            self::GOOGLE => 'Google',
        ];

        return $labels;
    }

    /**
     * Get the string version base on int value.
     *
     * @param int $key
     * @return string $label
     */
    public static function label($key)
    {
        $labels = self::labels();
        $label = $labels[$key];

        return $label;
    }

    /**
     * Get all the html version of the status.
     *
     * @return array $htmlLabels
     */
    public static function htmlLabels()
    {
        $htmlLabels = [
            self::GOOGLE => '<i class="fa-brands fa-google"></i> ' . self::label(self::GOOGLE),
        ];

        return $htmlLabels;
    }

    /**
     * Get the html version base on int value.
     *
     * @param int $key
     * @return string $htmlLabel
     */
    public static function htmlLabel($key)
    {
        $htmlLabels = self::htmlLabels();
        $htmlLabel = $htmlLabels[$key];

        return $htmlLabel;
    }
}
