<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	/**
	 * Display web homepage.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function index()
    {
        return view('web.index');
    }
}
