<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;

class CategoryController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('admin.create_category', compact('categories'));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.edit_category', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $category->save();

        return redirect('/admin/categorias');
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->title = $request->input('title');
        $category->description = $request->input('description');

        $category->save();
        $status = "Agregaste la categoría correctamente";
        return back()->with(compact('status'));
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('/admin/categorias');
    }
}
