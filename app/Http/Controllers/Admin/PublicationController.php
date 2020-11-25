<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublicationRequest;
use App\Services\PublicationService;
use App\Publication;
use App\PublicationCategory;
use Illuminate\Support\Facades\File;

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

    public function store(PublicationRequest $request, PublicationService $publicationService){
        $publication = new Publication();

        // Verifica si existe una imagen y lo guarda
        if ($request->hasFile('image')) {
            // Agrega la nueva imagen
            $nameImage = $publicationService->storeImage($request->file('image'));
            $publication->image = $nameImage;
        }

        $publication->title = $request->input('title');
        $publication->description = $request->input('description');
        $publication->link = $request->input('link');
        $publication->publication_category_id = $request->input('publication_category_id');
        $publication->save();
        return redirect('admin/publicaciones')->with('status', 'Publicación creada satisfactoriamente.');
    }

    public function edit(Publication $publication){
        $categories = PublicationCategory::all();
        return view('admin.publications.edit', compact('publication', 'categories'));
    }

    public function update(PublicationRequest $request, Publication $publication, PublicationService $publicationService){
        
        if ($request->hasFile('image')) {
            // Delete old image
            $oldNameImage = $publication->image;
            File::delete('storage/imagenes/publicaciones/' . $oldNameImage);

            // Add new image
            $nameImage = $publicationService->storeImage($request->file('image'));
            $publication->image = $nameImage;
        }

        $publication->title = $request->input('title');
        $publication->description = $request->input('description');
        $publication->link = $request->input('link');
        $publication->publication_category_id = $request->input('publication_category_id');
        $publication->save();
        return redirect('admin/publicaciones')->with('status', 'Publicación editada satisfactoriamente.');

    }

    public function destroy(Publication $publication){
        Publication::destroy($publication->id);
        File::delete('storage/imagenes/publicaciones/' . $publication->image);
        return redirect('admin/publicaciones')->with('status', 'Publicación borrada satisfactoriamente.');
    }

}
