<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Content;
use App\Category;
use App\Publication;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function contents(Request $request)
    {
        $search = trim($request->get('search'));

        $contents = Content::orderByDesc('id')
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                ->orWhere('editorial', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('date_published', 'like', "%$search%")
                ->orWhere('matter', 'like', "%$search%")
                ->orWhere('author', 'like', "%$search%");
            })
            ->with('category')
            ->with('subcategory')
            ->orderByDesc('created_at')
            ->paginate(15);

        if (count($contents) >= 1) {
            return view('admin.contents', compact('contents', 'search'));
        } else {
            $error = "No hay coincidencias con tu búsqueda de '$search'.";
            return view('admin.contents', compact('contents', 'error'));
        }
    }

    public function categories(Request $request)
    {
        $search = trim($request->get('search'));

        $category = Category::orderByDesc('id')
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', "%$search%");
            })
            ->orderByDesc('created_at')
            ->paginate(15);

        if (count($category) >= 1) {
            return view('admin.categories', compact('category', 'search'));
        } else {
            $error = "No hay coincidencias con tu búsqueda de '$search'.";
            return view('admin.categories', compact('category', 'error'));
        }
    }

    public function subcategories()
    {
        $subcategories = Subcategory::orderBy('category_id', 'asc')
        ->paginate(9);

        return view('admin.subcategories', compact('subcategories'));
    }

    public function publications()
    {
        $publications = Publication::orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate(9);
        return view('admin.publications', compact('publications'));
    }
}
