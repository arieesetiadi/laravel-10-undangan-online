<?php

namespace App\Http\Requests\CMS\Administrator;

use App\Constants\GeneralStatus;
use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $rules = [
            'username' => 'required|unique:Administrators,username,' . $request->administrator,
            'name' => 'required',
            'email' => 'required|unique:Administrators,email,' . $request->administrator,
            'avatar' => 'file|mimes:jpeg,jpg,png|max:1024',
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
            'status' => GeneralStatus::ACTIVE,
        ];

        // Include new password if its edited
        if ($this->password) {
            $credentials['password'] = Hash::make($this->password);
        }

        return $credentials;
    }
}
