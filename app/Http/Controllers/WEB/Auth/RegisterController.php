<?php

namespace App\Http\Controllers\WEB\Auth;

use App\Constants\GeneralStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use App\Http\Requests\WEB\Auth\RegisterRequest;
use App\Services\CustomerService;
use Exception;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Default service class.
     *
     * @var \App\Services\CustomerService
     */
    protected $customerService;

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
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
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
        try {
            $credentials = $request->credentials();

            // Check registration result
            $result = $this->customerService->create($credentials);

            if (! $result) {
                throw new Exception(__('auth.register.failed'));
            }

            // Login programmatically
            auth('web')->login($result);

            return ResponseController::success(__('auth.register.success'), route('web.home'));
        }
        //
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }
}
