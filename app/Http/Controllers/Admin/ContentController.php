<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use App\Content;
use App\Subcategory;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ContentController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('admin.create_content', compact('categories'));
    }

    public function edit(Content $content)
    {
        $categories = Category::all();
        $subcategories = Subcategory::where('category_id', $content->category_id)->get();
        return view('admin.edit_content', compact('content', 'categories', 'subcategories'));
    }

    public function update(Request $request, Content $content)
    {
        // TODO Validar request
        if ($request->hasFile('image')) {
            // Agrega la nueva imagen
            $image = $request->file('image');
            $nameImage = time() . '.' . $image->getClientOriginalName();
            $rute = public_path('storage/imagenes/contenido/') . $nameImage;
            Image::make($image)->resize(null, 900)->save($rute);

            // Borra la antigua imagen
            $oldNameImage = $content->image;
            Storage::delete('public/imagenes/contenido/' . $oldNameImage);

            // Actualiza la base de datos
            $content->image = $nameImage;
        }

        if ($request->hasFile('file')) {
            // Agrega el nuevo archivo
            $file = $request->file('file');
            $filename = time() . $file->getClientOriginalName();
            $file->move(public_path('storage/') . 'archivos/', $filename);

            // Borra el antiguo archivo
            $oldFilename = $content->file;
            Storage::delete('public/archivos/' . $oldFilename);

            //Actualiza la base de datos
            $content->file = $filename;
        }
        // $content->file = '';

        $content->link = $request->input('link');
        $content->author = $request->input('author');
        $content->editorial = $request->input('editorial');
        $content->title = $request->input('title');
        $content->description = $request->input('description');
        $content->date_published = $request->input('date_published');
        $content->matter = $request->input('matter');
        $content->active = $request->boolean('active');
        $content->category_id = $request->input('category_id');
        $content->subcategory_id = $request->input('subcategory_id');
        $content->save();

        return redirect('/admin/contenidos'); // TODO Agregar alerta de que se actualizó correctamente
    }

    public function destroy_image(Content $content)
    {
        // Si existe la imagen, la borra de la base de datos y del storage
        if ($content->image) {
            Storage::delete('public/imagenes/contenido/' . $content->image);
            $content->image = null;
            $content->save();
            return back()->with('status', 'Imagen borrada exitosamente.');
        } else {
            return back();
        }
    }

    public function store(Request $request)
    {
        // TODO validar archivos y alertar de que se guardó correctamente
        $content = new Content();

        // Verifica si existe una imagen y lo guarda
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nameImage = time() . $image->getClientOriginalName();
            $rute = public_path('storage') . '/imagenes/contenido/' . $nameImage;
            $content->image = $nameImage;
            Image::make($image)->resize(null, 900)->save($rute);
        }

        // Verifica si existe una archivo y lo guarda
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . $file->getClientOriginalName();
            $file->move(public_path('storage/') . 'archivos/', $filename);
            $content->file = $filename;
        }

        $content->link = $request->input('link');
        $content->author = $request->input('author');
        $content->editorial = $request->input('editorial');
        $content->title = $request->input('title');
        $content->description = $request->input('description');
        $content->date_published = $request->input('date_published');
        $content->matter = $request->input('matter');
        $content->active = $request->boolean('active');
        $content->category_id = $request->input('category_id');
        $content->subcategory_id = $request->input('subcategory_id');
        $content->save();

        return redirect('/admin/contenidos');
    }

    public function destroy(Content $content)
    {
        //TODO Alertar de que se borró correctamente
        Content::destroy($content->id);
        Storage::delete(['public/imagenes/contenido/' . $content->image, 'public/archivos/' . $content->file]);
        return redirect('/admin/contenidos');
    }
}
