<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display cms dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        return view('cms.dashboard', $data);
    }
}
