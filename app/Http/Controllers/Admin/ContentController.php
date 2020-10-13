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

    public function edit($id)
    {
        $content = Content::find($id);
        $categories = Category::all();
        $subcategories = Subcategory::where('category_id', $content->category_id)->get();
        return view('admin.edit_content', compact('content', 'categories', 'subcategories'));
    }

    public function update(Request $request, $id)
    {
        $content = Content::find($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nameImage = time() . $image->getClientOriginalName();
            $image->move(public_path() . '/imagenes/contenido/', $nameImage);
            $content->image = $nameImage;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nameFile = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/archivos/contenido/', $nameFile);

            $content->file = $nameFile;
        }

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

    public function store(Request $request)
    {
        $content = new Content();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nameImage = time() . $image->getClientOriginalName();
            $image->move(public_path() . '/imagenes/contenido/', $nameImage);
            $content->image = $nameImage;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nameFile = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/archivos/contenido/', $nameFile);

            $content->file = $nameFile;
        }

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

    public function destroy($id)
    {
        Content::destroy($id);
        return redirect('/admin/contenidos');
    }
}

