<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(9);
        return view('content.categories', compact('categories'));
    }

    public function show($id)
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
