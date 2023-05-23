<?php

namespace App\Http\Controllers\WEB\Auth;

use App\Constants\GeneralStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use App\Http\Requests\WEB\Auth\RegisterRequest;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;

class RegisterController extends Controller
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
        $this->title = __('auth.register.word');
    }

    /**
     * Display register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $view = $this->module.'.register';
            $data['title'] = $this->title;

            return view($view, $data);
        }
        //
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }

    /**
     * Register new customer data.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process(RegisterRequest $request)
    {
        dd($request->all());
        try {
            $credentials = $request->credentials();

            // Check registration result
            $result = Customer::create($credentials);

            if (! $result) {
                throw new Exception(__('auth.register.failed'));
            }

            // Login programmatically
            auth('web')->attempt($request->only(['username', 'password']));

            return ResponseController::success(__('auth.register.success'), route('web.home'));
        }
        //
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }

    /**
     * Activate new customer status.
     *
     * @param  \App\Http\Requests  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activate(Request $request)
    {
        try {
            $credentials = $request->all();

            // Check registration result
            $result = Customer::setStatus($credentials, GeneralStatus::ACTIVE);

            if (! $result) {
                throw new Exception(__('auth.register.failed'));
            }

            return ResponseController::success(__('auth.register.success'), route('web.auth.login.index'));
        }
        //
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }
}
