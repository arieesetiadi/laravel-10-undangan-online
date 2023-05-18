<?php

namespace App\Http\Controllers\WEB\Auth;

use App\Constants\GeneralStatus;
use App\Events\AdministratorRegistered;
use Illuminate\Http\Request;
use App\Models\Administrator;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WEB\ResponseController;
use App\Http\Requests\WEB\Auth\RegisterRequest;
use Exception;

class RegisterController extends Controller
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
    private $title = 'Register';

    /**
     * Display register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $view = $this->module . '.register';
            $data['title'] = $this->title;

            return view($view, $data);
        }
        // 
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }

    /**
     * Register new administrator data.
     *
     * @param \App\Http\Requests\WEB\Auth\RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process(RegisterRequest $request)
    {
        try {
            $credentials = $request->credentials();

            // Check registration result
            $result = Administrator::create($credentials);

            if (!$result) throw new Exception(__('auth.register.failed'));

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

            if (!$result) throw new Exception(__('auth.register.failed'));

            return ResponseController::success(__('auth.register.success'), route('cms.auth.login.index'));
        }
        // 
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }
}
