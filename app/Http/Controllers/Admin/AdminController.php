<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Content;
use App\Category;
use App\Publication;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function contents(Request $request)
    {
        if($request->get('order')){
            $order = trim($request->get('order'));
        }else{
            $order = 'created_at';
        }
        if ($request->get('orderby')) {
            $orderby = trim($request->get('orderby'));
        } else {
            $orderby = 'desc';
        }
        $search = trim($request->get('search'));

        if ($search) {
            return $this->search($request, $order, $orderby, $search);
        } else{
            $contents = Content::orderBy($order,$orderby)
                ->paginate(5);
            return view('admin.contents', compact('contents'));
        }
    }

    public function search(Request $request, $order, $orderby, $search){

            $contents = Content::orderBy($order, $orderby)
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('editorial', 'like', "%$search%")
                ->orWhere('date_published', 'like', "%$search%")
                ->orWhere('matter', 'like', "%$search%")
                ->orWhere('author', 'like', "%$search%")
                ->orWhere('file', 'like', "%$search%")
                ->orWhere('link', 'like', "%$search%")
                ->orWhere('level', 'like', "%$search%")
                ->orWhere('cdd', 'like', "%$search%")
                ->orWhere('isbn', 'like', "%$search%")
                ->orWhere('access', 'like', "%$search%");
            })
            ->with('category')
            ->with('subcategory')
            ->paginate(5);

        if (count($contents) >= 1) {
            return view('admin.contents', compact('contents', 'search'));
        } else {
            $contents = Content::orderBy($order, $orderby)
                ->orderBy('created_at', 'desc')
                ->paginate(5);
                return view('admin.contents', compact('contents', 'error'));
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
            return view('admin.categories', compact('category', 'search'));
        } else {
            $error = "No hay coincidencias con tu búsqueda de '$search'.";
            return view('admin.categories', compact('category', 'error'));
        }
    }

    public function subcategories()
    {
        $subcategories = Subcategory::orderBy('category_id', 'asc')
        ->paginate(9);

        return view('admin.subcategories', compact('subcategories'));
    }

    public function publications()
    {
        $publications = Publication::orderByDesc('created_at')
            ->orderByDesc('id')
            ->with('publication_category')
            ->paginate(9);
        return view('admin.publications.list', compact('publications'));
    }

}
