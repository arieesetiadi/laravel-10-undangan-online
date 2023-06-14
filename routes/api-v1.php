<?php

use App\Http\Controllers\API\V1\Payment\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Example
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// API Payment
Route::prefix('/payment')->group(function () {
    // Entry point
    Route::post('/', [PaymentController::class, 'index']);
    // Callback
    Route::post('/callback/{gateway}', [PaymentController::class, 'callback']);
});
