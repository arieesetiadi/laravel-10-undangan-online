<?php

namespace App\Constants;

class GeneralStatus
{
    /**
     * General status value.
     *
     * @var int
     */
    const ACTIVE = true;
    const INACTIVE = false;

    /**
     * Get all the string version of the status.
     *
     * @return array $labels
     */
    public static function labels()
    {
        $labels = [
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
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
            self::ACTIVE => '<span class="badge badge-success w-100">' . self::label(self::ACTIVE) . '</span>',
            self::INACTIVE => '<span class="badge badge-danger w-100">' . self::label(self::INACTIVE) . '</span>',
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
