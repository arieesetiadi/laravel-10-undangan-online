<?php

namespace App\Http\Requests\WEB;

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
        return auth('web')->check();
    }

    /**
     * Global form request attributes, with internationalization.
     *
     * @return array
     */
    public function attributes()
    {
        return BaseFormRequest::getI18nAttributes();
    }

    /**
     * Global form request messages, with internationalization.
     *
     * @return array
     */
    public function messages()
    {
        return BaseFormRequest::getI18nMessages();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|unique:customers,username,'.customer()->id,
            'name' => 'required',
            'email' => 'required|unique:customers,email,'.customer()->id,
            'password' => 'confirmed',
            'password_confirmation' => 'required_if:password,string',
        ];
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
            'phone' => $this->phone,
        ];

        // Include new password if its edited
        if ($this->password) {
            $credentials['password'] = Hash::make($this->password);
        }

        return $credentials;
    }
}
