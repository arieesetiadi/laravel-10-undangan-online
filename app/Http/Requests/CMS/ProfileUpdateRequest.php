<?php

namespace App\Http\Requests\CMS;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guard('cms')->check();
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
            'username' => 'required|unique:Administrators,username,' . administrator()->id,
            'email' => 'required|unique:Administrators,email,' . administrator()->id,
            'avatar' => 'file|mimes:jpeg,jpg,png|max:1024',
            'password' => 'confirmed',
            'password_confirmation' => 'required_if:password,string',
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
            'username' => $this->username,
            'name' => $this->name,
            'email' => $this->email,
        ];

        // Include new password if its edited
        if ($this->password) {
            $credentials['password'] = Hash::make($this->password);
        }

        return $credentials;
    }
}
