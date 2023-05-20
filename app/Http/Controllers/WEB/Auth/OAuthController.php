<?php

namespace App\Http\Controllers\WEB\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use App\Models\Customer;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    /**
     * Redirect with Socialite
     * 
     * @param string $driver
     */
    public function redirect($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * Retrieve request from socialite driver
     */
    public function callback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
            $customer = Customer::where('email', $user->email)->first();

            // Register new customer if not already
            if (!$customer) {
                $username = $user->nickname ?? explode('@', $user->email)[0];
                $customer = Customer::create([
                    'username' => $username,
                    'name' => $user->name,
                    'email' => $user->email,
                ]);

                $message = __('auth.register.success');
            }

            
            $message ??= __('auth.login.success');
            
            auth('web')->login($customer);
            
            // Redirect to WEB home
            return ResponseController::success($message, route('web.home'));
        }
        // 
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }
}
