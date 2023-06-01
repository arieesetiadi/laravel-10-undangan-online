<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use ValidatesRequests;

    /**
     * Default image upload path
     *
     * @var string
     */
    protected $uploadImagesPath = '/uploads/images';

    /**
     * Default file upload path
     *
     * @var string
     */
    protected $uploadFilesPath = '/uploads/files';
}
