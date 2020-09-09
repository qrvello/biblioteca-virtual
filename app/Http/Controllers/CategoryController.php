<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $categories= Category::all();

        return view('admin.create_category', compact('categories'));

    }

    public function store(Request $request){
        $category = new Category();
        $category->title = $request->input('title');
        $category->description = $request->input('description');

        $category->save();
        $status = "Agregaste la categoría correctamente";
        return back()->with(compact('status'));
    }

}
