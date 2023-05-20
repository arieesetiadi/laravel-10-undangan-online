<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Customer;
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
        $data['count'] = [
            'customers' => Customer::count(),
        ];
        
        return view('cms.dashboard', $data);
    }
}
