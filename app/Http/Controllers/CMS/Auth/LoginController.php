<?php

namespace App\Http\Controllers\CMS\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CMS\ResponseController;
use App\Http\Requests\CMS\Auth\LoginRequest;
use App\Models\Administrator;

class LoginController extends Controller
{
	/**
	 * Display login page.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function index()
    {
        $data['title'] = 'Login';
        
        return view('cms.auth.login')->with($data);
    }

	/**
	 * Attempt the login credentials.
	 *
     * @param \App\Http\Requests\CMS\Auth\LoginRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function process(LoginRequest $request)
    {
        try {
            $credentials = $request->credentials();

            // Check administrator status
            $status = Administrator::getStatus($credentials);
            
            if (!$status) {
                return ResponseController::failed(__('auth.account.inactive'));
            }

            // Check auth result
            $result = auth()->guard('cms')->attempt($credentials);

            if (!$result) {
                return ResponseController::failed(__('auth.login.failed'));
            }

            // Redirect to CMS Dashboard
            return ResponseController::success(__('auth.login.success'), route('cms.index'));
        }
        // 
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }
}
