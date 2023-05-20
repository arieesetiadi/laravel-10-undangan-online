<?php

namespace App\Http\Requests\CMS\Auth;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class RegisterRequest extends FormRequest
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
            'username' => 'required|unique:administrators,username',
            'name' => 'required',
            'email' => 'required|unique:administrators,email',
            'password' => 'required',
        ];
    }

    /**
     * Final result of the form request.
     *
     * @return array
     */
    public function credentials()
    {
        return [
            'username' => $this->username,
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ];
    }
}
