<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use App\Subcategory;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
	public function __construct()
	{
		// Solo usuarios autentificados pueden usar métodos de este controlador
		$this->middleware('auth');
	}

	public function create()
	{
		$categories = Category::all();
		return view('admin.create_content', compact('categories'));
	}

	public function show()
	{
		return view ('admin.content', compact('content'));
	}

	public function edit($id)
	{
		$content = Content::find($id);
		$categories = Category::all();
		$subcategories = Subcategory::where('category_id', $content->category_id)->get();
		return view('admin.edit_content', compact('content', 'categories', 'subcategories'));
	}

	public function update(Request $request, $id)
	{

		$content = Content::find($id);
		$content->file = $request->input('file');
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

	public function store(Request $request)
	{
        return $request;
		$content = new Content();
		if ($request->hasFile('image')) {
			$image = $request->file('image');
			$nameImage = time() . $image->getClientOriginalName();
			$image->move(public_path() . '/imagenes/contenido/', $nameImage);
			$content->image = $nameImage;
		}

		if ($request->hasFile('file')) {
			$file = $request->file('file');
			$nameFile = time() . $file->getClientOriginalName();
			$file->move(public_path() . '/archivos/contenido/', $nameFile);

			$content->file = $nameFile;
		}

		$content->author = $request->input('author');
		$content->editorial = $request->input('editorial');
		$content->title = $request->input('title');
		$content->description = $request->input('description');
		$content->date_published = $request->input('date_published');
		$content->matter = $request->input('matter');
		$content->active = $request->boolean('active');
		$content->category_id = $request->input('category_id');
		$content->subcategory_id = $request->input('subcategory_id');
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
