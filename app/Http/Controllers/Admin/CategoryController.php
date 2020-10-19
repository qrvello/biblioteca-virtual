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

    public function edit(Category $category)
    {
        return view('admin.edit_category', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
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

    public function destroy($category)
    {
        Category::destroy($category->id);
        return redirect('/admin/categorias'); // TODO borrar categorias hijos
    }
}
