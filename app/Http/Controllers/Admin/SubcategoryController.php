<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\SubcategoryRequest;
use App\Subcategory;

class SubcategoryController extends Controller
{
    public function list()
    {
        $subcategories = Subcategory::orderBy('category_id', 'asc')
            ->with('category')
            ->paginate(9);
        return view('admin.subcategories.list', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::whereHas('subcategories')->orWhereDoesntHave('contents')->get();
        return view('admin.subcategories.create', compact('categories'));
    }

    public function edit(Subcategory $subcategory)
    {
        return view('admin.subcategories.edit', compact('subcategory'));
    }

    public function update(SubcategoryRequest $request, Subcategory $subcategory)
    {
        $subcategory->update($request->all());

        return redirect('/admin/subcategorias')->with('status', 'Actualizaste la subcategoría correctamente.');
    }

    public function store(SubcategoryRequest $request)
    {
        $subcategory = new Subcategory();
        $subcategory->fill($request->all());
        $subcategory->save();

        return redirect('/admin/subcategorias')->with('status', 'Creaste la subcategoría correctamente.');
    }

    public function destroy(Subcategory $subcategory)
    {
        Subcategory::destroy($subcategory->id);
        return redirect('/admin/subcategorias');
    }
}
