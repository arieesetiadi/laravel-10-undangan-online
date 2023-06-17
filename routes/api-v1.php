<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\API\V1\Payment\PaymentController;
use App\Http\Controllers\API\V1\Customer\CustomerController;
use App\Http\Controllers\API\V1\Administrator\AdministratorController;
use App\Http\Controllers\API\V1\Auth\LoginController;
use App\Http\Controllers\API\V1\Auth\LogoutController;

/*
|--------------------------------------------------------------------------
| API Routes Version 1
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// API Locale
Route::middleware('locale.use.api')->group(function () {
    // API Guest
    Route::middleware('guest:sanctum')->group(function () {
        Route::post('/login/process', [LoginController::class, 'process']);
    });
    
    // API Authenticated
    Route::middleware('auth:sanctum')->group(function () {
        // API Logout
        Route::post('/logout/process', [LogoutController::class, 'process']);
        
        // API Payment
        Route::prefix('/payment')->group(function () {
            // Entry Point
            Route::post('/', [PaymentController::class, 'index']);
            // Callback
            Route::post('/callback/{gateway}', [PaymentController::class, 'callback']);
        });

        // API Administrators
        Route::apiResource('administrators', AdministratorController::class);

        // API Customers
        Route::apiResource('customers', CustomerController::class);
    });
});
