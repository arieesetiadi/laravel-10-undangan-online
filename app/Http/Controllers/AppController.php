<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CMS\ResponseController;
use Illuminate\Support\Facades\Artisan;

class AppController extends Controller
{
    /**
     * Clear laravel application.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clear()
    {
        try {
            Artisan::call('app:clear');
            return ResponseController::success(__('general.process.success'));
        } catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }
}
