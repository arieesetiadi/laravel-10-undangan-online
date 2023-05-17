<?php

namespace App\Http\Requests;

class BaseFormRequest
{
    /**
     * Global form request attributes, with internationalization.
     *
     * @return array
     */
    public static function getI18nAttributes()
    {
        $i18nAttributes = [
            'username' => __('validation.attributes.username'),
            'name' => __('validation.attributes.name'),
            'email' => __('validation.attributes.email'),
            'avatar' => __('validation.attributes.avatar'),
            'password' => __('validation.attributes.password'),
            'password_confirmation' => __('validation.attributes.password_confirmation'),
        ];

        return $i18nAttributes;
    }

    /**
     * Global form request messages, with internationalization.
     *
     * @return array
     */
    public static function getI18nMessages()
    {
        $i18nMessages = [
            'required' => __('validation.required'),
            'required_if' => __('validation.required_if'),
            'email' => __('validation.email'),
            'confirmed' => __('validation.confirmed'),
            'exists' => __('validation.exists'),
            'unique' => __('validation.unique'),
            'file' => __('validation.file'),
            'mimes' => __('validation.mimes'),
            'min' => __('validation.min'),
            'max' => __('validation.max'),
            'in' => __('validation.in'),
        ];

        return $i18nMessages;
    }
}
