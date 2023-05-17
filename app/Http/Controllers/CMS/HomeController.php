<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	/**
	 * Display CMS dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function index()
    {
        $data['title'] = 'Home';
        
        return view('cms.index')->with($data);
    }
}
