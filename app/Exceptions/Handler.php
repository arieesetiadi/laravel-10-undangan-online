<?php

namespace App\Exceptions;

use App\Constants\HttpStatus;
use App\Http\Controllers\API\ResponseController;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        // Handle auth exception
        $this->renderable(function (AuthenticationException $e, $request) {
            if ($request->is('api/*')) {
                throw ResponseController::failed(
                    code: HttpStatus::UNAUTHORIZED,
                    message: $e->getMessage()
                );
            }
        });

        // Handle validation exception
        $this->renderable(function (ValidationException $e, $request) {
            if ($request->is('api/*')) {
                throw ResponseController::failed(
                    code: HttpStatus::UNPROCESSABLE_ENTITY,
                    message: $e->getMessage(),
                    errors: $e->validator->errors()
                );
            }
        });
    }
}
