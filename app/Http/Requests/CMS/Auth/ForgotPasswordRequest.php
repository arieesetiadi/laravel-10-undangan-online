<?php

namespace App\Http\Requests\CMS\Auth;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Global form request attributes, with internationalization.
     *
     * @return array
     */
    public function attributes()
    {
        $attributes = BaseFormRequest::getI18nAttributes();
        return $attributes;
    }

    /**
     * Global form request messages, with internationalization.
     *
     * @return array
     */
    public function messages()
    {
        $messages = BaseFormRequest::getI18nMessages();
        return $messages;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'email' => 'required|email|exists:Administrators,email',
        ];

        return $rules;
    }

    /**
     * Final result of the form request.
     *
     * @return array
     */
    public function credentials()
    {
        $credentials = [
            'email' => $this->email,
        ];

        return $credentials;
    }
}
