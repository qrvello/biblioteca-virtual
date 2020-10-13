<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Content;
use App\Subcategory;
class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){

        $subcategory= Subcategory::all();

        return view('admin.create_subcategory', compact('subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = Subcategory::find($id);
        return view('admin.edit_category', compact('subcategory'));
    }

    public function update(Request $request, $id){

        $subcategory = Subcategory::find($id);
        $subcategory->title = $request->input('title');
        $subcategory->description = $request->input('description');
        $subcategory->save();

        return redirect()->route('admin.categories');
    }

    public function store(Request $request){
        $subcategory = new Subcategory();
        $subcategory->title = $request->input('title');
        $subcategory->description = $request->input('description');

        $subcategory->save();
        $status = "Agregaste la categoría correctamente";
        return back()->with(compact('status'));
    }

    public function destroy($id)
    {
        Subcategory::destroy($id);
        return redirect()->route('admin.categories');
    }


}
