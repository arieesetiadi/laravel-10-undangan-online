<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Upload an image file with storage.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @param  string  $path
     * @param  string  $old
     * @return string $name
     */
    public static function uploadImage($file, $path, $old = null)
    {
        /** @var Illuminate\Filesystem\FilesystemAdapter */
        $storage = Storage::disk('public');

        // Upload new image
        $name = time() . '-' . $file->hashName();
        $result = $storage->putFileAs($path, $file, $name);

        // Remove old image
        if ($result && $old) {
            $oldPath = $path . '/' . $old;
            $oldExist = $storage->exists($oldPath);

            // Remove old image if exist in the storage
            if ($oldExist) {
                $storage->delete($oldPath);
            }
        }

        return $name;
    }
}
