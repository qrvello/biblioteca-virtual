<?php

namespace App\Services;
use Intervention\Image\Facades\Image;


class PublicationService
{
    public function storeImage($image)
    {
        // Resize and store image
        $nameImage = time() . '.' . $image->getClientOriginalName();
        $rute = public_path('storage/imagenes/publicaciones/') . $nameImage;
        Image::make($image)
            ->resize(900, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($rute);
        return $nameImage;
    }


}
