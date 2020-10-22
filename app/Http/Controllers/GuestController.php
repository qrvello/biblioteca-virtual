<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use App\Content;
use App\Publication;
use App\PublicationCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuestController extends Controller
{
    public function index()
    {
        $news_id = PublicationCategory::where('name', 'Noticias escolares')
            ->get('id')
            ->first();
        if ($news_id) {
            $news = Publication::orderByDesc('created_at')
                ->where('publication_category_id', $news_id->id)
                ->take(3)
                ->get();
        } else {
            $news = null;
        }
        // Devuelve la vista index con 3 Noticias escolares ordenadas de manera decreciente por fecha de creación.

        $efemerides_id = PublicationCategory::where('name', 'Efemérides')
            ->get('id')
            ->first();
        if ($efemerides_id) {
            $efemerides = Publication::orderByDesc('created_at')
                ->where('publication_category_id', $efemerides_id->id)
                ->take(3)
                ->get();
        } else {
            $efemerides = null;
        }

        // Devuelve la vista index con 3 Efemérides ordenadas de manera decreciente por fecha de creación.

        $journalistic_notes_id = PublicationCategory::where('name', 'Notas periodísticas')
            ->get('id')
            ->first();
        if ($journalistic_notes_id) {
            $journalistic_notes = Publication::orderByDesc('created_at')
                ->where('publication_category_id', $journalistic_notes_id->id)
                ->take(3)
                ->get();
        } else {
            $journalistic_notes = null;
        }
        // Devuelve la vista index con 3 Notas periódisticas ordenadas de manera decreciente por fecha de creación.

        $contents = Content::orderByDesc('created_at')
            ->take(3)
            ->get();
        if (!$contents) {
            $contents = null;
        }

        $publications = Publication::get()->first();
        if(!$publications){
            $publications = null;
        }

        return view('index', compact('news', 'efemerides', 'journalistic_notes', 'contents', 'publications'));
    }

    public function nosotros()
    {
        return view('nosotros');
    }

    public function contents(Request $request)
    {
        if ($request) {
            // Si existe la variable search en get, usa el método search, sino devuelve la vista con todos los contenidos.
            $search = trim($request->get('search'));
            if ($search) {
                return $this->search($search);
            } else {
                $contents = Content::where('active', 1)
                    ->orderBy('created_at', 'desc')
                    ->paginate(6);
                return view('content.index', compact('contents'));
            }
        }
    }

    public function download_file(Content $content)
    {
        return response()->download(public_path('storage/archivos/' . $content->file));
    }

    public function search($search)
    {
        $contents = Content::where('active', 1)
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
            ->orderByDesc('id')
            ->paginate(6);

        if (count($contents) >= 1) {
            return view('content.index', compact('contents', 'search'));
        } else {
            $error = "No hay coincidencias con tu búsqueda de '$search'.";
            return view('content.index', compact('contents', 'error'));
        }
    }

    public function categories()
    {
        $categories = Category::orderByDesc('created_at')
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
        $contents = Content::orderByDesc('created_at')->paginate(2);
        $publications = Publication::orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate(6);
        return view('publications.index', compact('publications'));
    }

    // Manda subcategorías dependiendo la categoría seleccionada
    public function byCategory($id)
    {
        return Subcategory::where('category_id', $id)->get();
    }
}
