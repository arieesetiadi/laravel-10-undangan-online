<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Constants\HttpStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\ResponseController;
use App\Http\Requests\API\V1\Auth\LoginRequest;
use App\Models\Administrator;
use App\Services\AdministratorService;
use Exception;
use Illuminate\Auth\AuthenticationException;

class LoginController extends Controller
{
    /**
     * Default service class.
     *
     * @var \App\Services\AdministratorService
     */
    protected $administratorService;

    /**
     * Initiate controller properties value.
     */
    public function __construct()
    {
        $this->administratorService = new AdministratorService();
    }


    public function process(LoginRequest $request)
    {
        try {
            $administrator = $request->administrator();

            // Delete previous auth token
            $administrator->tokens()->where('name', 'auth')->delete();

            // Generate new auth token
            $token = $administrator->createToken('auth')->plainTextToken;

            $data = [
                'token' => $token,
                'administrator' => $administrator,
            ];

            return ResponseController::success(
                code: HttpStatus::OK,
                message: __('response.auth.login.success'),
                data: $data,
            );
        }
        // 
        catch (\Throwable $error) {
            return ResponseController::failed(
                code: $error->getCode(),
                message: $error->getMessage(),
                errors: $error->getTrace(),
            );
        }
    }
}
