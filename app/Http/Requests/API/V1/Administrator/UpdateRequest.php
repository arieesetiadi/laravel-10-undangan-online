<?php

namespace App\Http\Requests\API\V1\Administrator;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;
use Exception;
use App\Http\Requests\BaseFormRequest;
use App\Constants\HttpStatus;
use App\Constants\GeneralStatus;
use App\Services\AdministratorService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Check administrator existance
        $administrator = (new AdministratorService())->find($this->administrator);

        if (!$administrator) {
            throw new ModelNotFoundException(__('response.administrators.not_found'), HttpStatus::NOT_FOUND);
        }

        // Refactor phone number to i18n format
        $this->merge([
            'phone' => normalize_phone($this->phone),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|unique:administrators,username,' . $this->administrator,
            'name' => 'required',
            'email' => 'required|email|unique:administrators,email,' . $this->administrator,
            'phone' => 'nullable|unique:administrators,phone,' . $this->administrator,
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
            'phone' => normalize_phone($this->phone),
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
