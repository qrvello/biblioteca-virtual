<?php

namespace App\Http\Controllers;

use App\Content;
use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subcategories(){

        $subcategory = Subcategory::all();

        return view('admin.subcategory', $subcategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


    }
}
