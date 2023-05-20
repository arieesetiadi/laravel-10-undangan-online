<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CMS\Auth\LoginController as CMSLoginController;
use App\Http\Controllers\CMS\Auth\LogoutController as CMSLogoutController;
use App\Http\Controllers\CMS\DashboardController;
use App\Http\Controllers\CMS\Modules\AdministratorController;
use App\Http\Controllers\CMS\ProfileController as CMSProfileController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\WEB\Auth\ForgotPasswordController as WEBForgotPasswordController;
use App\Http\Controllers\WEB\Auth\LoginController as WEBLoginController;
use App\Http\Controllers\WEB\Auth\LogoutController as WEBLogoutController;
use App\Http\Controllers\WEB\Auth\OAuthController;
use App\Http\Controllers\WEB\Auth\RegisterController as WEBRegisterController;
use App\Http\Controllers\WEB\HomeController;
use App\Http\Controllers\WEB\ProfileController as WEBProfileController;
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

Route::prefix('/system')->as('cms.')->middleware('locale.use:en')->group(function () {
	// CMS Guest
	Route::middleware('guest:cms')->group(function () {
		Route::prefix('/auth')->as('auth.')->group(function () {
			// CMS Login
			Route::prefix('/login')->as('login.')->controller(CMSLoginController::class)->group(function () {
				Route::get('/', 'index')->name('index');
				Route::post('/process', 'process')->name('process');
			});
		});
	});

	// CMS Authenticated
	Route::middleware('auth:cms')->group(function () {
		// CMS Dashboard
		Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

		// CMS Module Administrator
		Route::controller(AdministratorController::class)->group(function () {
			Route::prefix('/administrator')->as('administrator.')->group(function () {
				Route::post('/{administrator}/toggle', 'toggle')->name('toggle');
				Route::get('/pdf', 'pdf')->name('pdf');
				Route::get('/excel', 'excel')->name('excel');
			});
			Route::resource('/administrator', AdministratorController::class);
		});

		// CMS Profile
		Route::prefix('/profile')->as('profile.')->controller(CMSProfileController::class)->group(function () {
			Route::get('/', 'index')->name('index');
			Route::post('/update', 'update')->name('update');
		});

		// CMS Logout
		Route::prefix('/auth/logout')->as('logout.')->controller(CMSLogoutController::class)->group(function () {
			Route::get('/', 'process')->name('process');
		});
	});
});


/*
|--------------------------------------------------------------------------
| WEB Routes
|--------------------------------------------------------------------------
*/

Route::prefix('/')->as('web.')->middleware('locale.use')->group(function () {
	// WEB Home
	Route::get('/', [HomeController::class, 'home'])->name('home');

	// WEB Guest
	Route::middleware('guest:web')->group(function () {
		Route::prefix('/oauth')->as('oauth.')->controller(OAuthController::class)->group(function () {
			Route::get('/{driver}/redirect', 'redirect')->name('redirect');
			Route::get('/{driver}/callback', 'callback')->name('callback');
		});

		Route::prefix('/auth')->as('auth.')->group(function () {
			// WEB Login
			Route::prefix('/login')->as('login.')->controller(WEBLoginController::class)->group(function () {
				Route::get('/', 'index')->name('index');
				Route::post('/process', 'process')->name('process');
			});

			// WEB Register
			Route::prefix('/register')->as('register.')->controller(WEBRegisterController::class)->group(function () {
				Route::get('/', 'index')->name('index');
				Route::post('/process', 'process')->name('process');
				Route::get('/activate', 'activate')->name('activate');
			});

			// WEB Forget Password
			Route::prefix('/forgot-password')->as('forgot-password.')->controller(WEBForgotPasswordController::class)->group(function () {
				Route::get('/', 'index')->name('index');
				Route::post('/send', 'send')->name('send');
				Route::post('/reset', 'reset')->name('reset');
			});
		});
	});

	// WEB Authenticated
	Route::middleware('auth:web')->group(function () {
		// WEB Profile
		Route::prefix('/profile')->as('profile.')->controller(WEBProfileController::class)->group(function () {
			Route::get('/', 'index')->name('index');
			Route::post('/update', 'update')->name('update');
		});

		// WEB Logout
		Route::prefix('/auth/logout')->as('logout.')->controller(WEBLogoutController::class)->group(function () {
			Route::get('/', 'process')->name('process');
		});
	});
});
