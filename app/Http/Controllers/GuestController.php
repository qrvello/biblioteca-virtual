<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use App\Content;
use App\Publication;
use App\PublicationCategory;
use App\Services\GuestService;
use App\Services\PublicationCategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index(PublicationCategoryService $publicationCategoryService)
    {
        $categories = PublicationCategory::get(['name', 'id']);

        // Take 3 publication per category
        $categories = $publicationCategoryService->getLastPublications($categories);

        $contents = Content::orderBy('created_at', 'desc')
            ->with('category')
            ->with('subcategory')
            ->where('active', true)
            ->take(2)
            ->get();

        return view('index', compact('categories', 'contents'));
    }

    public function nosotros()
    {
        return view('nosotros');
    }

    public function contents(Request $request, GuestService $guestService)
    {
        if ($request->search) {
            // Si existe la variable search en get, usa el método search, sino devuelve la vista con todos los contenidos.
            $search = trim($request->get('search'));
            if ($search) {
                return $guestService->search($search);
            }
        } else {
            $contents = Content::where('active', 1)
                ->with('category')
                ->with('subcategory')
                ->orderBy('created_at', 'desc')
                ->paginate(6);
            return view('content.index', compact('contents'));
        }
    }

    public function download_file(Content $content)
    {
        $extension = \File::extension($content->file);
        return response()->download(public_path('storage/archivos/' . $content->file), $content->title . $extension);
    }



    public function categories()
    {
        $categories = Category::orderByDesc('created_at')
            ->with('subcategories')
            ->with('contents')
            ->orderBy('title', 'asc')
            ->paginate(8);
        return view('content.categories', compact('categories'));
    }

    public function category_show(Category $category)
    {
        $contents = Content::where('category_id', '=', $category->id)
            ->orderBy('id', 'asc')
            ->paginate(6);
        if (count($contents) >= 1) {
            return view('content.index', compact('contents', 'category'));
        } else {
            $error = 'No hay contenidos en esta categoría.';
            return view('content.index', compact('category', 'error'));
        }
    }

    public function subcategories(Category $category)
    {
        $subcategories = Subcategory::where('category_id', $category->id)
            ->orderBy('id', 'asc')
            ->paginate(6);
        if (count($subcategories) >= 1) {
            return view('content.subcategories', compact('subcategories', 'category'));
        } else {
            $error = 'No hay subcategorías en esta categoría.';
            return view('content.subcategories', compact('category', 'error'));
        }
    }

    public function subcategory_show(Subcategory $subcategory)
    {
        $contents = Content::where('subcategory_id', $subcategory->id)
            ->orderBy('id', 'desc')
            ->paginate(6);
        if (count($contents) >= 1) {
            return view('content.index', compact('contents', 'subcategory'));
        } else {
            $error = 'No hay contenidos en esta subcategoría.';
            return view('content.index', compact('subcategory', 'error'));
        }
    }

    public function publications()
    {
        $publications = Publication::orderByDesc('created_at')
            ->paginate(6);
        return view('publications.index', compact('publications'));
    }

    public function publications_categories()
    {
        $categories = PublicationCategory::orderByDesc('created_at')
            ->paginate(6);
        return view('publications.categories', compact('categories'));
    }

    // Muestra publicaciones de una categoría en especifico
    public function publications_categories_show(PublicationCategory $category)
    {
        $publications = Publication::orderByDesc('created_at')
            ->where('publication_category_id', $category->id)
            ->paginate(5);

        return view('publications.index', compact('publications', 'category'));
    }

    // Manda subcategorías al select dependiendo la categoría seleccionada
    public function byCategory($id)
    {
        return Subcategory::where('category_id', $id)->get(['title', 'id']);
    }
}
