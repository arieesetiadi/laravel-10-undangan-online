<?php

namespace App\Services;

use File;
use Intervention\Image\Facades\Image;

class FileService
{
    /**
     * Upload image path.
     *
     * @var string
     */
    private $uploadImagePath;

    /**
     * Upload file path.
     *
     * @var string
     */
    private $uploadFilePath;

    /**
     * Initiate class value
     */
    public function __construct()
    {
        $this->uploadImagePath = storage_path('app/public/uploads/images');
        $this->uploadFilePath = storage_path('app/public/uploads/files');
    }

    /**
     * Upload an image file with Intervention Image.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @param  string  $directory
     * @param  string  $old
     * @return string  $name
     */
    public function uploadImage($file, $directory, $old = null)
    {
        // Prepare meta data
        $format = 'webp';
        $name = uniqid().'.'.$format;
        $path = $this->uploadImagePath.'/'.$directory.'/'.$name;

        // Save new image
        Image::make($file)->encode($format)->save($path, 90);

        // Remove old image
        $this->remove($this->uploadImagePath, $directory, $old);

        return $name;
    }

    /**
     * Remove file if exist.
     *
     * @param  string  $path
     * @param  string  $directory
     * @param  string|null  $name
     * @return void
     */
    public function remove($path, $directory, $name)
    {
        if ($name) {
            $path = $path.'/'.$directory.'/'.$name;
            if (file_exists($path)) {
                File::delete($path);
            }
        }
    }
}
