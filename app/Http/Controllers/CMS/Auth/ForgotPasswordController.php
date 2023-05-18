<?php

namespace App\Http\Controllers\CMS\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CMS\ResponseController;
use App\Http\Requests\CMS\Auth\ForgotPasswordRequest;
use App\Http\Requests\CMS\Auth\ResetPasswordRequest;
use App\Mail\CMS\Auth\ForgotPasswordMail;
use App\Models\Administrator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
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
    private $title = 'Forgot Password';

    /**
     * Display forgot password page.
     *
     * @param \App\Http\Requests $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $view = $this->module . '.forgot-password';
            $data = [
                'title' => $this->title,
                'email' => $request->email,
            ];

            return view($view, $data);
        }
        // 
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }

    /**
     * Send email with forgot password request.
     *
     * @param \App\Http\Requests\CMS\Auth\ForgotPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(ForgotPasswordRequest $request)
    {
        try {
            $credentials = $request->credentials();

            Mail::send(new ForgotPasswordMail($credentials));

            return ResponseController::success(__('auth.password_reset.sent'), route('cms.auth.login.index'));
        }
        // 
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }

    /**
     * Reset the administrator password.
     *
     * @param \App\Http\Requests\CMS\Auth\ResetPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset(ResetPasswordRequest $request)
    {
        try {
            $credentials = $request->credentials();
            $result = Administrator::setPassword($credentials);

            if (!$result) throw new Exception(__('auth.password_reset.failed'));

            return ResponseController::success(__('auth.password_reset.success'), route('cms.auth.login.index'));
        }
        // 
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }
}
