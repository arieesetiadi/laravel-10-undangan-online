<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	/**
	 * Display web homepage.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function home()
	{
		return view('web.home');
	}
}
