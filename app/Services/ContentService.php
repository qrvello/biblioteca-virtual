<?php

namespace App\Services;

use Intervention\Image\Facades\Image;

class ContentService
{
    function storeImage($image)
    {
        // Resize and store image
        $nameImage = time() . '.' . $image->getClientOriginalName();
        $rute = public_path('storage/imagenes/contenido/') . $nameImage;
        Image::make($image)
            ->resize(900, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($rute);
        return $nameImage;
    }

    function storeFile($file)
    {
        // Store the file
        $filename = time() . $file->getClientOriginalName();
        $file->move(public_path('storage/') . 'archivos/', $filename);
        return $filename;
    }
}
