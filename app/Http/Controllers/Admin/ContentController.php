<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use App\Content;
use App\Http\Requests\ContentStoreRequest;
use App\Http\Requests\ContentUpdateRequest;
use App\Services\ContentService;
use App\Subcategory;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    /**
     * Show the form for create a content.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.create_content', compact('categories'));
    }

    /**
     * Show the form for edit a content.
     *
     * @param Content $content
     * @return \Illuminate\View\View
     */
    public function edit(Content $content)
    {
        $categories = Category::all();
        $subcategories = Subcategory::where('category_id', $content->category_id)->get();
        return view('admin.edit_content', compact('content', 'categories', 'subcategories'));
    }

    /**
     * Update a content.
     *
     * @param ContentUpdateRequest $request
     * @param Content $content
     * @return Response
     */
    public function update(ContentUpdateRequest $request, Content $content, ContentService $contentService)
    {
        if ($request->hasFile('image')) {
            // Delete old image
            $oldNameImage = $content->image;
            Storage::delete('imagenes/contenido/' . $oldNameImage);

            // Add new image
            $nameImage = $contentService->storeImage($request->file('image'));
            $content->image = $nameImage;
        }

        if ($request->hasFile('file')) {
            // Delete old file
            $oldFilename = $content->file;
            Storage::delete('public/archivos/' . $oldFilename);

            // Add new file
            $filename = $contentService->storeFile($request->file('file'));
            $content->file = $filename;
        }

        $content->active = $request->boolean('active');
        $content->update($request->except(['file', 'image', 'active']));

        return redirect('/admin/contenidos')->with('status', 'Contenido actualizado satisfactoriamente.');
    }

    public function destroy_image(Content $content)
    {
        // Si existe la imagen, la borra de la base de datos y del storage
        if ($content->image) {
            Storage::delete('imagenes/contenido/' . $content->image);
            $content->image = null;
            $content->save();
            return back()->with('status', 'Imagen borrada exitosamente.');
        } else {
            return back();
        }
    }

    public function store(ContentStoreRequest $request, ContentService $contentService)
    {
        $content = new Content();

        // Verifica si existe una imagen y lo guarda
        if ($request->hasFile('image')) {
            // Agrega la nueva imagen
            $nameImage = $contentService->storeImage($request->file('image'));
            $content->image = $nameImage;
        }

        // Verifica si existe una archivo y lo guarda
        if ($request->hasFile('file')) {
            // Agrega el nuevo archivo
            $filename = $contentService->storeFile($request->file('file'));
            $content->file = $filename;
        }

        $content->active = $request->boolean('active');
        $content->fill($request->except(['file', 'image', 'active']));
        $content->save();

        return redirect('/admin/contenidos')->with('status', 'Contenido creado satisfactoriamente.');
    }

    public function destroy(Content $content)
    {
        Content::destroy($content->id);
        Storage::delete(['imagenes/contenido/' . $content->image, 'public/archivos/' . $content->file]);
        return back()->with('status', 'Contenido borrado satisfactoriamente.');
    }
}
