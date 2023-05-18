<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    // Global controller properties
    protected $imagesPath = '/images';
	protected $filesPath = '/files';
    
    use AuthorizesRequests, ValidatesRequests;
}
