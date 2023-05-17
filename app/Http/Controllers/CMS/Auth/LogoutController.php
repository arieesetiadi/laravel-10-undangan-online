<?php

namespace App\Http\Controllers\CMS\Auth;

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
        // Logout cms user
        auth()->guard('cms')->logout();

        return redirect()->route('cms.auth.login.index');
    }
}
