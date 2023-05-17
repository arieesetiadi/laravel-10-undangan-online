<?php

namespace App\Constants;

class SwalIcon
{
    /**
     * Available icons for sweet alert.
     *
     * @var string
     */
    const SUCCESS = 'success';
    const ERROR = 'error';
    const WARNING = 'warning';
    const INFO = 'info';
    const QUESTION = 'question';

    /**
     * Get all the string version of the status.
     *
     * @return array $labels
     */
    public static function labels()
    {
        $labels = [
            self::SUCCESS => 'Success',
            self::ERROR => 'Failed',
            self::WARNING => 'Warning',
            self::INFO => 'Info',
            self::QUESTION => 'Confirmation'
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
}
