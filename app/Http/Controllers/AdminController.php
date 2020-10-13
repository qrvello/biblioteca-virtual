<?php

namespace App\Http\Controllers;

use App\Content;
use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function contents(Request $request)
    {
            $search = trim($request->get('search'));

            $content = Content::orderByDesc('id')
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

                if (count($content) >= 1) {
                    return view('admin.content', compact('content', 'search'));
                } else {
                    $error = "No hay coincidencias con tu búsqueda de '$search'.";
                    return view('admin.content', compact('content', 'error'));
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
            return view('admin.category', compact('category', 'search'));
        } else {
            $error = "No hay coincidencias con tu búsqueda de '$search'.";
            return view('admin.category', compact('category', 'error'));
        }

    }

    public function subcategories(){

        $subcategory = Subcategory::all();

        return view('admin.subcategory', $subcategory);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {

    }

}
