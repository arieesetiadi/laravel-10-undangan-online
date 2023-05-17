<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileController;
use App\Http\Controllers\CMS\ResponseController;
use App\Http\Requests\CMS\ProfileUpdateRequest;
use App\Models\Administrator;

class ProfileController extends Controller
{
    /**
     * General upload directory for images | documents.
     * 
     * @var string
     */
    private $uploadPath = '/profiles';

    /**
     * Display profile page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Profile';

        return view('cms.profile')->with($data);
    }

    /**
     * Update profile data.
     * 
     * @param \App\Http\Requests\CMS\ProfileUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        try {
            $credentials = $request->credentials();
            $administrator = Administrator::find(administrator()->id);

            // Upload image if exist
            if ($request->avatar) {
                $profileImageName = FileController::uploadImage($request->avatar, $this->uploadPath, $administrator->avatar);
                $credentials['avatar'] = $profileImageName;
            }

            // Check update result
            $result = $administrator->update($credentials);

            if (!$result) {
                return ResponseController::failed(__('auth.profile.update.failed'));
            }

            return ResponseController::success(__('auth.profile.update.success'));
        }
        // 
        catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }
}
