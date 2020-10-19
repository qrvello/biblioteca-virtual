<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Content;
use App\Category;
use App\Subcategory;

class SubcategoryController extends Controller
{
    public function create()
    {
        $categories = Category::whereHas('subcategories')->orWhereDoesntHave('contents')->get();

        return view('admin.create_subcategory', compact('categories'));
    }

    public function edit(Subcategory $subcategory)
    {
        return view('admin.edit_subcategory', compact('subcategory'));
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $subcategory->title = $request->input('title');
        $subcategory->description = $request->input('description');
        $subcategory->save();

        $status = "Editaste la subcategoría correctamente";
        return back()->with(compact('status'));
    }

    public function store(Request $request)
    {
        $subcategory = new Subcategory();
        $subcategory->category_id = $request->input('category_id');
        $subcategory->title = $request->input('title');
        $subcategory->description = $request->input('description');

        $subcategory->save();
        $status = "Agregaste la subcategoría correctamente";
        return back()->with(compact('status'));
    }

    public function destroy($id)
    {
        Subcategory::destroy($id);
        return redirect('/admin/subcategorias');

    }

    public function show()
    {
    }
}
