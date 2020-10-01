<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.edit_category', compact('category'));
    }


    public function update(Request $request, $id){

        $category = Category::find($id);
        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $category->save();

        return redirect()->route('admin.categories');
    }

    public function store(Request $request){
        $category = new Category();
        $category->title = $request->input('title');
        $category->description = $request->input('description');

        $category->save();
        $status = "Agregaste la categoría correctamente";
        return back()->with(compact('status'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('admin.categories');
    }
}
