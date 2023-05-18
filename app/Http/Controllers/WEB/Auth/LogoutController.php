<?php

namespace App\Http\Controllers\WEB\Auth;

use App\Http\Controllers\WEB\ResponseController;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    /**
     * Logout the current logged in administrator.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process()
    {
        try {
            // Logout cms user
            auth()->guard('cms')->logout();
    
            return redirect()->route('cms.auth.login.index');
		}
		// 
		catch (\Throwable $th) {
			return ResponseController::failed($th->getMessage());
		}
    }
}
