<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CMS\Auth\ForgotPasswordController;
use App\Http\Controllers\CMS\Auth\LoginController;
use App\Http\Controllers\CMS\Auth\LogoutController;
use App\Http\Controllers\CMS\Auth\RegisterController;
use App\Http\Controllers\CMS\HomeController as CMSHomeController;
use App\Http\Controllers\CMS\Modules\AdministratorController;
use App\Http\Controllers\CMS\ProfileController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\WEB\HomeController;
use App\Http\Controllers\WEB\PaymentController;
use Illuminate\Support\Facades\Route;


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

Route::prefix('/cms')->as('cms.')->middleware('locale.use')->group(function () {
	// Guest
	Route::middleware('guest:cms')->group(function () {
		Route::prefix('/auth')->as('auth.')->group(function () {
			// Login
			Route::prefix('/login')->as('login.')->controller(LoginController::class)->group(function () {
				Route::get('/', 'index')->name('index');
				Route::post('/process', 'process')->name('process');
			});

			// Register
			Route::prefix('/register')->as('register.')->controller(RegisterController::class)->group(function () {
				Route::get('/', 'index')->name('index');
				Route::post('/process', 'process')->name('process');
				Route::get('/activate', 'activate')->name('activate');
			});

			// Forget Password
			Route::prefix('/forgot-password')->as('forgot-password.')->controller(ForgotPasswordController::class)->group(function () {
				Route::get('/', 'index')->name('index');
				Route::post('/send', 'send')->name('send');
				Route::post('/reset', 'reset')->name('reset');
			});
		});
	});

	// Authenticated
	Route::middleware('auth:cms')->group(function () {
		// CMS Home
		Route::get('/', [CMSHomeController::class, 'index'])->name('index');

		// CMS Module Administrator
		Route::controller(AdministratorController::class)->group(function () {
			Route::prefix('/administrator')->as('administrator.')->group(function () {
				Route::post('/{administrator}/toggle-status', 'toggleStatus')->name('toggle-status');
			});
			Route::resource('/administrator', AdministratorController::class);
		});

		// CMS Profile
		Route::prefix('/profile')->as('profile.')->controller(ProfileController::class)->group(function () {
			Route::get('/', 'index')->name('index');
			Route::post('/update', 'update')->name('update');
		});

		// CMS Logout
		Route::prefix('/auth/logout')->as('logout.')->controller(LogoutController::class)->group(function () {
			Route::get('/', 'process')->name('process');
		});
	});
});


/*
|--------------------------------------------------------------------------
| WEB Routes
|--------------------------------------------------------------------------
*/

Route::prefix('/')->as('web.')->group(function () {
	// WEB Home
	Route::get('/', [HomeController::class, 'index'])->name('index');

	// WEB Payment
	Route::prefix('/payment')->as('payment.')->group(function () {
		Route::post('/', [PaymentController::class, 'index'])->name('index');
	});
});
