<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PublicationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Publication;
use App\PublicationCategory;

class PublicationController extends Controller
{
    public function list()
    {
        $publications = Publication::orderByDesc('created_at')
        ->orderByDesc('id')
            ->with('publication_category')
            ->paginate(9);
        return view('admin.publications.list', compact('publications'));
    }

    public function create(){
        $categories = PublicationCategory::get(['name', 'id']);
        return view('admin.publications.create', compact('categories'));
    }

    public function store(Request $request, PublicationService $publicationservice){
        $publication = new Publication();

        // Verifica si existe una imagen y lo guarda
        if ($request->hasFile('image')) {
            // Agrega la nueva imagen
            $nameImage = $publicationservice->storeImage($request->file('image'));
            $publication->image = $nameImage;
        }

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

    public function update(Request $request, Publication $publication, PublicationService $publicationservice){

        if ($request->hasFile('image')) {
            // Delete old image
            $oldNameImage = $publication->image;
            Storage::delete('imagenes/contenido/' . $oldNameImage);

            // Add new image
            $nameImage = $publicationservice->storeImage($request->file('image'));
            $publication->image = $nameImage;
        }

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
