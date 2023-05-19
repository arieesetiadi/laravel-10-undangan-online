<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ResponseController;
use App\Http\Requests\WEB\ProfileUpdateRequest;
use App\Models\Administrator;
use Exception;

class ProfileController extends Controller
{
    /**
     * Controller module path.
     * 
     * @var string
     */
    private $module = 'web';

    /**
     * Controller module title.
     * 
     * @var string
     */
    private $title = 'Profile';

    /**
     * Display profile page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $view = $this->module . '.profile';
            $data['title'] = $this->title;

            return view($view, $data);
        }
        // 
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }

    /**
     * Update profile data.
     * 
     * @param \App\Http\Requests\WEB\ProfileUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        try {
            $credentials = $request->credentials();
            $administrator = Administrator::find(administrator()->id);

            // Upload image if exist
            if ($request->avatar) {
                $profileImageName = FileController::uploadImage($request->avatar, $this->imagesPath . '/avatars', $administrator->avatar);
                $credentials['avatar'] = $profileImageName;
            }

            // Check update result
            $result = $administrator->update($credentials);

            if (!$result) throw new Exception(__('auth.profile.update.failed'));

            return ResponseController::success(__('auth.profile.update.success'));
        }
        // 
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }
}
