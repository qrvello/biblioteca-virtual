<?php

namespace App\Http\Controllers;

use App\Content;
use App\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.index');
    }

    public function contents()
    {
        $contents = Content::paginate(15);

        return view('admin.content', compact('contents'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        $categories = Category::paginate(15);

        return view('admin.category', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $categories = Category::all();
        $content = Content::find($id);
        return view('admin.project-edit', compact('content', 'categories'));
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detalle()
    {

        return view('admin.project-detail');

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
        // Content::destroy($id)

        // return redirect()->route('create_content');
        // Content::destroy($id);



    }
}
