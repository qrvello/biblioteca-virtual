<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.create_content', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $content = Content::find($id);
        return view('admin.edit_content', compact('content', 'categories'));
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

        $content = Content::find($id);
        $content->file = $request->input('file');;
        $content->author = $request->input('author');
        $content->editorial = $request->input('editorial');
        $content->title = $request->input('title');
        $content->description = $request->input('description');
        $content->date_published = $request->input('date_published');
        $content->image = $request->file('image');
        $content->matter = $request->input('matter');
        $content->active = $request->input('active');
        $content->category_id = $request->input('category_id');
        $content->save();

        return redirect()->route('admin.content');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);
        }

        $content = new Content();
        $content->file = $request->input('file');
        $content->author = $request->input('author');
        $content->editorial = $request->input('editorial');
        $content->title = $request->input('title');
        $content->description = $request->input('description');
        $content->date_published = $request->input('date_published');
        $content->image = $name;
        $content->matter = $request->input('matter');
        $content->active = $request->input('active');
        $content->category_id = $request->input('category_id');
        $content->save();

        return redirect()->route('admin.content');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Content::destroy($id);
        return redirect()->route('admin.content');
    }
}
