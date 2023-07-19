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
        return [
            'credential' => 'informasi login',
            'username' => 'username',
            'name' => 'nama',
            'email' => 'email',
            'password' => 'kata sandi',
            'password_confirmation' => 'konfirmasi kata sandi',
            'question' => 'pertanyaan',
            'answer' => 'jawaban',
        ];
    }
}
