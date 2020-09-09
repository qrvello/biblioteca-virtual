<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use App\Publication;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $publications = Publication::orderByDesc('created_at')
            ->paginate(6);
        // dd($publications);
        return view('index', compact('publications'));
    }
    public function nosotros()
    {
        return view('nosotros');
    }

    public function contents(Request $request)
    {
        if ($request) {
            $search = trim($request->get('search'));

            $contents = Content::where('active', '=', true)
                ->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%$search%")
                        ->orWhere('editorial', 'like', "%$search%")
                        ->orWhere('description', 'like', "%$search%")
                        ->orWhere('date_published', 'like', "%$search%")
                        ->orWhere('matter', 'like', "%$search%")
                        ->orWhere('author', 'like', "%$search%");
                })
                ->with('category')
                ->orderByDesc('created_at')
                ->orderByDesc('id')
                ->paginate(9);

            if (count($contents) >= 1) {
                return view('content.index', compact('contents', 'search'));
            } else {
                $error = "No hay coincidencias con tu búsqueda de '$search'.";
                return view('content.index', compact('contents', 'error'));
            }
        }

        if ($request->get('categoria')) {
            $search = $request->get('categoria');
            $contents = Content::where('category_id', 'LIKE', "%$search%")
                ->paginate(9);
            if (count($contents) >= 1) {
                return view('content.index', compact('contents', 'search', 'count_result'));
            } else {
                $error = 'No hay coincidencias con tu búsqueda de ' . $search . '.';
                return view('content.index', compact('contents', 'error'));
            }
        }
    }

    public function categories()
    {
        $categories = Category::paginate(9);
        return view('content.categories', compact('categories'));
    }

    public function category_show($id)
    {
        if ($id) {
            $category = Category::find($id);
            $contents = Content::where('category_id', '=', $id)
                ->orderBy('id', 'asc')
                ->paginate(9);
            if (count($contents) >= 1) {
                return view('content.index', compact('contents', 'category'));
            }
        }
    }

    public function publications()
    {
        $publications = Publication::paginate(9);

        return view('publications.index', compact('publications'));
    }
}
