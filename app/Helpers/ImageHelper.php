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
    $width = 850;
    $height = 650;
    $blank_img =  Image::canvas($width, $height, '#EBEEF7');
    $pathCreate = public_path("/uploads/$path/");
    if (!File::isDirectory($pathCreate)) {
        File::makeDirectory($pathCreate, 0777, true, true);
    }

    $updated_img = Image::make($file);
    $imageWidth = $updated_img->width();
    $imageHeight = $updated_img->height();
    $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

    if ($imageWidth > $width) {
        $updated_img->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        });
    }
    if ($imageHeight > $height) {
        $updated_img->resize(null, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
    }


    $blank_img->insert($updated_img, 'center');
    $blank_img->save(public_path('/uploads/' . $path . '/') . $fileName);

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
