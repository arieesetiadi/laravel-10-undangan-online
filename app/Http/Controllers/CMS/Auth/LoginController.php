<?php

namespace App\Http\Controllers\CMS\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use App\Http\Requests\CMS\Auth\LoginRequest;
use App\Models\Administrator;
use App\Services\AdministratorService;
use Exception;

class LoginController extends Controller
{
    /**
     * Default service class.
     * 
     * @var \App\Services\AdministratorService $administratorService
     */
    protected $administratorService;

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
    public function __construct(AdministratorService $administratorService)
    {
        $this->administratorService = $administratorService;
        $this->module = 'cms.auth';
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process(LoginRequest $request)
    {
        try {
            $credentials = $request->credentials();

            // Check administrator status
            $status = $this->administratorService->getStatus($credentials);

            if (!$status) {
                throw new Exception(__('auth.account.inactive'));
            }

            // Check auth result
            $result = auth('cms')->attempt($credentials);

            if (!$result) {
                throw new Exception(__('auth.login.failed'));
            }

            // Redirect to CMS Dashboard
            return ResponseController::success(__('auth.login.success'), route('cms.dashboard'));
        }
        //
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }
}
