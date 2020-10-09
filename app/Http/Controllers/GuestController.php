<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use App\Content;
use App\Publication;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        // Devuelve la vista index con 6 publicaciones ordenadas de manera decreciente por fecha de creación.
        $publications = Publication::orderByDesc('created_at')
            ->orderByDesc('id')
            ->take(6)
            ->get();
        return view('index', compact('publications'));
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
            if($search){
                return $this->search($search);
            }else{
                $contents = Content::where('active', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(9);
                return view('content.index', compact('contents'));
            }
        }
    }

    public function search($search){
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
            ->paginate(9);

        if (count($contents) >= 1) {
            return view('content.index', compact('contents'));
        } else {
            $error = "No hay coincidencias con tu búsqueda de '$search'.";
            return view('content.index', compact('contents', 'error'));
        }
    }

    public function categories()
    {
        $categories = Category::orderByDesc('created_at')
        ->orderByDesc('id')
        ->paginate(9);
        return view('content.categories', compact('categories'));
    }

    public function category_show($id)
    {
        if ($id) {
            $category = Category::find($id);
            $contents = Content::where('category_id', $id)
                ->with('category')
                ->orderBy('id', 'asc')
                ->paginate(9);
            if (count($contents) >= 1) {
                return view('content.index', compact('contents', 'category'));
            }
        }
    }

    public function subcategories($category)
    {
        $subcategories = Subcategory::paginate(9)
            ->where('category_id', $category);
        return view('content.subcategories', compact('subcategories'));
    }

    public function subcategory_show($id){
        if ($id) {
            $contents = Content::where('subcategory_id', $id)
                ->orderByDesc('created_at')
                ->orderByDesc('id')
                ->paginate(9);
            if (count($contents) >= 1) {

                return view('content.index', compact('contents'));
            }
        }
    }

    public function publications()
    {
        $publications = Publication::orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate(9);
        return view('publications.index', compact('publications'));
    }
}
