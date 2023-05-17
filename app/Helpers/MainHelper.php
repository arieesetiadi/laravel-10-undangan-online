<?php

use Carbon\Carbon;

/**
 * Date and Time format.
 * 
 * @var string
 */
const DATE_FORMAT = 'l, j F Y';
const TIME_FORMAT = 'h:i A';
const DATE_TIME_FORMAT = DATE_FORMAT . ' ' . TIME_FORMAT;

/**
 * Get authenticated user (cms).
 * 
 * @return \App\Models\Administrator $administrator
 */
if (!function_exists('administrator')) {
    function administrator()
    {
        $administrator = auth()->guard('cms')->user();
        return $administrator;
    }
}

/**
 * Format date for general human.
 * 
 * @param string $datetime
 * @param string $locale
 * @return string $date
 */
if (!function_exists('human_date')) {
    function human_date($datetime, $locale = null)
    {
        $carbon = Carbon::make($datetime);
        $carbon->setLocale($locale);
        $carbon->settings(['formatFunction' => 'translatedFormat']);
        $date = $carbon->format(DATE_FORMAT);

        return $date;
    }
}

/**
 * Format time for general human.
 * 
 * @param string $datetime
 * @param string $locale
 * @return string $time
 */
if (!function_exists('human_time')) {
    function human_time($datetime, $locale = null)
    {
        $carbon = Carbon::make($datetime);
        $carbon->setLocale($locale);
        $carbon->settings(['formatFunction' => 'translatedFormat']);
        $time = $carbon->format(TIME_FORMAT);

        return $time;
    }
}

/**
 * Format datetime for general human.
 * 
 * @param string $datetime
 * @param string $locale
 * @return string $datetime
 */
if (!function_exists('human_datetime')) {
    function human_datetime($datetime, $locale = null)
    {
        $carbon = Carbon::make($datetime);
        $carbon->setLocale($locale);
        $carbon->settings(['formatFunction' => 'translatedFormat']);
        $datetime = $carbon->format(DATE_TIME_FORMAT);

        return $datetime;
    }
}

/**
 * Format date diff for human.
 * 
 * @param string $datetime
 * @param string $locale
 * @return string $datetime
 */
if (!function_exists('human_datetime_diff')) {
    function human_datetime_diff($datetime, $locale = null)
    {
        $carbon = Carbon::make($datetime);
        $carbon->setLocale($locale);
        $diff = $carbon->diffForHumans();

        return $diff;
    }
}
