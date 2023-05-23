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
        return auth('cms')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'username' => 'required|unique:administrators,username,'.$request->administrator,
            'name' => 'required',
            'email' => 'required|unique:administrators,email,'.$request->administrator,
            'avatar' => 'file|mimes:jpeg,jpg,png|max:1024',
        ];
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
}
