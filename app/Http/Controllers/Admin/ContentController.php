<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use App\Content;
use App\Http\Requests\ContentRequest;
use App\Services\ContentService;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContentController extends Controller
{
    public function list(Request $request, ContentService $contentService)
    {
        if ($search = trim($request->get('search'))) {
            $contents = $contentService->search($request);
            if (count($contents)) {
                return view('admin.contents', compact('contents', 'search'));
            } else {
                $error = "No se encontraron resultados con tu busqueda de '$search'";
                return view('admin.contents', compact('contents', 'error'));
            }
        }

        if ($order = trim($request->get('order'))) {
            $contents = $contentService->order($request);
            return view('admin.contents', compact('contents'));
        }

        $contents = Content::orderBy('created_at', 'desc')
            ->with('category')
            ->with('subcategory')
            ->paginate(5);
        return view('admin.contents.list', compact('contents'));
    }

    /**
     * Show the form for create a content.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::get(['title', 'id']);
        return view('admin.contents.create', compact('categories'));
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
        return view('admin.contents.edit', compact('content', 'categories', 'subcategories'));
    }

    /**
     * Update a content.
     *
     * @param ContentRequest $request
     * @param Content $content
     * @return Response
     */
    public function update(ContentRequest $request, Content $content, ContentService $contentService)
    {
        if ($request->hasFile('image')) {
            // Delete old image
            $oldNameImage = $content->image;
            File::delete('storage/imagenes/contenido/' . $oldNameImage);

            // Add new image
            $nameImage = $contentService->storeImage($request->file('image'));
            $content->image = $nameImage;
        }

        if ($request->hasFile('file')) {
            // Delete old file
            $oldFilename = $content->file;
            File::delete('storage/archivos/' . $oldFilename);

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
            File::delete('storage/imagenes/contenido/' . $content->image);
            $content->image = null;
            $content->save();
            return back()->with('status', 'Imagen borrada exitosamente.');
        } else {
            return back();
        }
    }

    public function destroy_file(Content $content)
    {
        // Si existe la imagen, la borra de la base de datos y del storage
        if ($content->file) {
            File::delete('storage/archivos/' . $content->file);
            $content->file = null;
            $content->save();
            return back()->with('status', 'Archivo borrado exitosamente.');
        } else {
            return back();
        }
    }

    public function store(ContentRequest $request, ContentService $contentService)
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
        File::delete('storage/imagenes/contenido/' . $content->image);
        File::delete('storage/archivos/' . $content->file);

        Content::destroy($content->id);
        return back()->with('status', 'Contenido borrado satisfactoriamente.');
    }

}
