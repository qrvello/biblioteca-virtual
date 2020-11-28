<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use App\Subcategory;

class CategoryController extends Controller
{
    public function list(Request $request, CategoryService $categoryService)
    {
        if ($search = trim($request->get('search'))) {
            $categories = $categoryService->search($search);
            if (count($categories)) {
                return view('admin.categories', compact('categories', 'search'));
            } else {
                $error = "No hay coincidencias con tu búsqueda de '$search'.";
                return view('admin.categories', compact('categories', 'error'));
            }
        }

        $categories = Category::orderByDesc('created_at')
            ->paginate(15);

        return view('admin.categories.list', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        return redirect('/admin/categorias')->with('status', 'Categoría actualizada satisfactoriamente.');
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->fill($request->all());
        $category->save();

        return back()->with('status', 'Creaste la categoría satisfactoriamente.');
    }

    public function destroy($category)
    {
        Category::destroy($category);
        return redirect('/admin/categorias');
    }
}
