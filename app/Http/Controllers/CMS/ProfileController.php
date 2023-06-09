<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use App\Http\Requests\CMS\ProfileUpdateRequest;
use App\Services\AdministratorService;
use App\Services\FileService;
use Exception;

class ProfileController extends Controller
{
    /**
     * Default service class.
     *
     * @var \App\Services\AdministratorService
     */
    protected $administratorService;

    /**
     * File service class.
     *
     * @var \App\Services\FileService
     */
    protected $fileService;

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
     * Initiate resource service class.
     */
    public function __construct()
    {
        $this->administratorService = new AdministratorService();
        $this->fileService = new FileService();
        $this->module = 'cms';
        $this->title = 'Profile';
    }

    /**
     * Display profile page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $view = $this->module.'.profile';
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        try {
            $credentials = $request->credentials();
            $administrator = $this->administratorService->find(administrator()->id);

            // Upload avatar if exist
            if ($request->avatar) {
                $avatar = $this->fileService->uploadImage($request->avatar, 'avatars', $administrator->avatar);
                $credentials['avatar'] = $avatar;
            }

            // Check update result
            $result = $administrator->update($credentials);

            if (! $result) {
                throw new Exception(__('auth.profile.update.failed'));
            }

            return ResponseController::success(__('auth.profile.update.success'));
        }
        //
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }
}
