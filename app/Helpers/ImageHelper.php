<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


/**
 * image upload
 *
 * @param object $file
 * @param string $path
 * @return string
 */
function uploadImage(?object $file, string $path): string
{
    $pathCreate = public_path("/uploads/$path/");
    if (!File::isDirectory($pathCreate)) {
        File::makeDirectory($pathCreate, 0777, true, true);
    }

    $updated_img = Image::make($file);
    $updated_img->resize(850, null, function ($constraint) {
        $constraint->aspectRatio();
    });
    $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
    $updated_img->save(public_path('/uploads/' . $path . '/') . $fileName);

    return "uploads/$path/" . $fileName;

}

/**
 * image delete
 *
 * @param string $image
 * @return void
 */
function deleteImage(?string $image)
{
    $imageExists = file_exists($image);

    if ($imageExists) {
        @unlink($image);
    }
}
