<?php

namespace App\Http\Controllers\CMS\Auth;

use App\Constants\GeneralStatus;
use App\Events\AdministratorRegistered;
use Illuminate\Http\Request;
use App\Models\Administrator;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CMS\ResponseController;
use App\Http\Requests\CMS\Auth\RegisterRequest;
use App\Mail\CMS\Auth\AccountActivationMail;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /**
     * Display register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Register';

        return view('cms.auth.register')->with($data);
    }

    /**
     * Register new administrator data.
     *
     * @param \App\Http\Requests\CMS\Auth\RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process(RegisterRequest $request)
    {
        try {
            $credentials = $request->credentials();

            // Check registration result
            $result = Administrator::create($credentials);

            if (!$result) {
                return ResponseController::failed(__('auth.register.failed'));
            }

            // Event when administrator registered
            event(new AdministratorRegistered($credentials));

            return ResponseController::success(__('auth.register.sent'), route('cms.auth.login.index'));
        }
        // 
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }

    /**
     * Activate new administrator status.
     *
     * @param \App\Http\Requests $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activate(Request $request)
    {
        try {
            $credentials = $request->all();

            // Check registration result
            $result = Administrator::setStatus($credentials, GeneralStatus::ACTIVE);

            if (!$result) {
                return ResponseController::failed(__('auth.register.failed'));
            }

            return ResponseController::success(__('auth.register.success'), route('cms.auth.login.index'));
        }
        // 
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }
}
