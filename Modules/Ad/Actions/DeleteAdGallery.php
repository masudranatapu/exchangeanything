<?php

namespace Modules\Ad\Actions;

use App\Actions\File\FileDelete;

class DeleteAdGallery
{
    public static function delete($gallery)
    {dd($gallery);
        if (file_exists($gallery->image)) {
            FileDelete::delete($gallery->image);
        }
        return $gallery->delete();
    }
}
