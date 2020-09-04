<?php

namespace App\Http\Controllers;
use App\Category;
use App\Content;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function nosotros()
    {
        return view('nosotros');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contents(Request $request)
    {
        if ($request) {
            $search = trim($request->get('search'));

            $type = $request->get('type');

            $count_result = count(Content::type($type, $search)->get());

            $contents = Content::type($type, $search)
                ->orderBy('id', 'asc')
                ->paginate(9);

            if (count($contents) >= 1) {
                return view('content.index', compact('contents', 'search', 'count_result'));
            } else {
                $error = 'No hay coincidencias con tu búsqueda de ' . $search . '.';
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
}
