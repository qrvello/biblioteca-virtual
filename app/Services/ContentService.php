<?php

namespace App\Services;

use App\Content;
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

    public function search($request)
    {
        $search = trim($request->get('search'));

        if ($request->get('order')) {
            $order = trim($request->get('order'));
        } else {
            $order = 'created_at';
        }

        if ($request->get('orderby')) {
            $orderby = trim($request->get('orderby'));
        } else {
            $orderby = 'desc';
        }

        $contents = Content::orderBy($order, $orderby)
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('editorial', 'like', "%$search%")
                ->orWhere('date_published', 'like', "%$search%")
                ->orWhere('matter', 'like', "%$search%")
                ->orWhere('author', 'like', "%$search%")
                ->orWhere('file', 'like', "%$search%")
                ->orWhere('link', 'like', "%$search%")
                ->orWhere('level', 'like', "%$search%")
                ->orWhere('cdd', 'like', "%$search%")
                ->orWhere('isbn', 'like', "%$search%")
                ->orWhere('access', 'like', "%$search%");
            })
            ->with('category')
            ->with('subcategory')
            ->paginate(5);

            return $contents;

    }
}
