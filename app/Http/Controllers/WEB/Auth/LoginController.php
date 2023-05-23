<?php

namespace App\Http\Controllers\WEB\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use App\Http\Requests\WEB\Auth\LoginRequest;
use App\Models\Customer;
use Exception;

class LoginController extends Controller
{
    /**
     * Controller module path.
     *
     * @var string
     */
    private $module;

    /**
     * Controller module title.
     *
     * @var string
     */
    private $title;

    /**
     * Initiate controller properties value.
     */
    public function __construct()
    {
        $this->module = 'web.auth';
        $this->title = __('auth.login.word');
    }

    /**
     * Display login page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $view = $this->module.'.login';
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process(LoginRequest $request)
    {
        try {
            $credentials = $request->credentials();
            $remember = $request->remember();

            // Check customer status
            $status = Customer::getStatus($credentials);

            if (! $status) {
                throw new Exception(__('auth.account.inactive'));
            }

            // Check auth result
            $result = auth('web')->attempt($credentials, $remember);

            if (! $result) {
                throw new Exception(__('auth.login.failed'));
            }

            // Redirect to WEB home
            return ResponseController::success(__('auth.login.success'), route('web.home'));
        }
        //
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }
}
