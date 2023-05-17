<?php

namespace App\Http\Requests\CMS\Administrator;

use App\Constants\GeneralStatus;
use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreRequest extends FormRequest
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
            'username' => 'required|unique:Administrators,username',
            'name' => 'required',
            'email' => 'required|unique:Administrators,email',
            'avatar' => 'file|mimes:jpeg,jpg,png|max:1024',
            'password' => 'required',
        ];

        return $rules;
    }

    /**
     * Final result of the form request.
     *
     * @return array $credentials
     */
    public function credentials()
    {
        $credentials = [
            'username' => $this->username,
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'status' => GeneralStatus::ACTIVE,
        ];

        return $credentials;
    }
}
