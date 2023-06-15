<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WEB\ProfileController as WEBProfileController;
use App\Http\Controllers\WEB\HomeController;
use App\Http\Controllers\WEB\Auth\RegisterController as WEBRegisterController;
use App\Http\Controllers\WEB\Auth\OAuthController;
use App\Http\Controllers\WEB\Auth\LogoutController as WEBLogoutController;
use App\Http\Controllers\WEB\Auth\LoginController as WEBLoginController;
use App\Http\Controllers\WEB\Auth\ForgotPasswordController as WEBForgotPasswordController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\CMS\Modules\CustomerController;
use App\Http\Controllers\CMS\Modules\AdministratorController;
use App\Http\Controllers\CMS\DashboardController;
use App\Http\Controllers\CMS\Auth\LogoutController as CMSLogoutController;
use App\Http\Controllers\CMS\Auth\LoginController as CMSLoginController;
use App\Http\Controllers\AppController;

/*
|--------------------------------------------------------------------------
| General Routes
|--------------------------------------------------------------------------
*/

Route::get('/locale/switch/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');
Route::get('/app/clear', [AppController::class, 'clear'])->name('app.clear');

/*
|--------------------------------------------------------------------------
| CMS Routes
|--------------------------------------------------------------------------
*/

Route::prefix('/system')->as('cms.')->middleware('locale.use:en')->group(function () {
    // CMS Guest
    Route::middleware('guest:cms')->group(function () {
        Route::prefix('/auth')->as('auth.')->group(function () {
            // CMS Login
            Route::prefix('/login')->as('login.')->group(function () {
                Route::get('/', [CMSLoginController::class, 'index'])->name('index');
                Route::post('/process', [CMSLoginController::class, 'process'])->name('process');
            });
        });
    });

    // CMS Authenticated
    Route::middleware('auth:cms')->group(function () {
        // CMS Dashboard
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

        // CMS Module Administrators
        Route::prefix('/administrators')->as('administrators.')->group(function () {
            Route::post('/{administrator}/toggle', [AdministratorController::class, 'toggle'])->name('toggle');
            Route::get('/pdf', [AdministratorController::class, 'pdf'])->name('pdf');
            Route::get('/excel', [AdministratorController::class, 'excel'])->name('excel');
        });
        Route::resource('/administrators', AdministratorController::class);

        // CMS Module Customer
        Route::prefix('/customers')->as('customers.')->group(function () {
            Route::post('/{customer}/toggle', [CustomerController::class, 'toggle'])->name('toggle');
            Route::get('/pdf', [CustomerController::class, 'pdf'])->name('pdf');
            Route::get('/excel', [CustomerController::class, 'excel'])->name('excel');
        });
        Route::resource('/customers', CustomerController::class);

        // CMS Logout
        Route::prefix('/auth/logout')->as('logout.')->group(function () {
            Route::get('/', [CMSLogoutController::class, 'process'])->name('process');
        });
    });
});

/*
|--------------------------------------------------------------------------
| WEB Routes
|--------------------------------------------------------------------------
*/

Route::prefix('/{locale?}')->as('web.')->middleware('locale.use')->group(function () {
    // WEB Home
    Route::get('/', [HomeController::class, 'home'])->name('home');

    // WEB Guest
    Route::middleware('guest:web')->group(function () {
        // WEB OAuth
        Route::prefix('/oauth')->as('oauth.')->group(function () {
            Route::get('/{driver}/redirect', [OAuthController::class, 'redirect'])->name('redirect');
            Route::get('/{driver}/callback', [OAuthController::class, 'callback'])->name('callback');
        });

        // WEB Auth
        Route::prefix('/auth')->as('auth.')->group(function () {
            // WEB Login
            Route::prefix('/login')->as('login.')->group(function () {
                Route::get('/', [WEBLoginController::class, 'index'])->name('index');
                Route::post('/process', [WEBLoginController::class, 'process'])->name('process');
            });

            // WEB Register
            Route::prefix('/register')->as('register.')->group(function () {
                Route::get('/', [WEBRegisterController::class, 'index'])->name('index');
                Route::post('/process', [WEBRegisterController::class, 'process'])->name('process');
                Route::get('/activate', [WEBRegisterController::class, 'activate'])->name('activate');
            });

            // WEB Forget Password
            Route::prefix('/forgot-password')->as('forgot-password.')->group(function () {
                Route::get('/', [WEBForgotPasswordController::class, 'index'])->name('index');
                Route::post('/send', [WEBForgotPasswordController::class, 'send'])->name('send');
                Route::post('/reset', [WEBForgotPasswordController::class, 'reset'])->name('reset');
            });
        });
    });

    // WEB Authenticated
    Route::middleware('auth:web')->group(function () {
        // WEB Profile
        Route::prefix('/profile')->as('profile.')->group(function () {
            Route::get('/', [WEBProfileController::class, 'index'])->name('index');
            Route::post('/update', [WEBProfileController::class, 'update'])->name('update');
        });

        // WEB Logout
        Route::prefix('/auth/logout')->as('logout.')->group(function () {
            Route::get('/', [WEBLogoutController::class, 'process'])->name('process');
        });
    });
});
