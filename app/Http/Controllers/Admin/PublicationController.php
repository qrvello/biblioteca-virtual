<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Publication;
use App\PublicationCategory;

class PublicationController extends Controller
{
    public function create(){
        $categories = PublicationCategory::all();
        return view('admin.publications.create', compact('categories'));
    }

    public function store(Request $request){
        $publication = new Publication();
        $publication->title = $request->input('title');
        $publication->description = $request->input('description');
        $publication->publication_category_id = $request->input('publication_category_id');
        $publication->save();
        return back()->with('status', 'Publicación creada satisfactoriamente.');
    }

    public function edit(Publication $publication){
        $categories = PublicationCategory::all();
        return view('admin.publications.edit', compact('publication', 'categories'));
    }

    public function update(Request $request, Publication $publication){
        $publication->title = $request->input('title');
        $publication->description = $request->input('description');
        $publication->publication_category_id = $request->input('publication_category_id');
        $publication->save();
        return back()->with('status', 'Publicación editada satisfactoriamente.');

    }

    public function destroy(Publication $publication){
        Publication::destroy($publication->id);
        return back()->with('status', 'Publicación borrada satisfactoriamente.');
    }

}
