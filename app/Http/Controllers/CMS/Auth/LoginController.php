<?php

namespace App\Http\Controllers\CMS\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CMS\ResponseController;
use App\Http\Requests\CMS\Auth\LoginRequest;
use App\Models\Administrator;
use Exception;

class LoginController extends Controller
{
    /**
     * Controller module path.
     * 
     * @var string
     */
    private $module = 'cms.auth';

    /**
     * Controller module title.
     * 
     * @var string
     */
    private $title = 'Login';

    /**
     * Display login page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $view = $this->module . '.login';
            $data['title'] = $this->title;

            return view($view, $data);
        }
        // 
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
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

            if (!$status) throw new Exception(__('auth.account.inactive'));

            // Check auth result
            $result = auth()->guard('cms')->attempt($credentials);

            if (!$result) throw new Exception(__('auth.login.failed'));

            // Redirect to CMS Dashboard
            return ResponseController::success(__('auth.login.success'), route('cms.dashboard'));
        }
        // 
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }
}
