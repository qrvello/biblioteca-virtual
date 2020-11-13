<?php

namespace App\Services;
use App\Content;

class GuestService
{
    public function search($search)
    {
        $contents = Content::where('active', 1)
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                    ->orWhere('editorial', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%")
                    ->orWhere('date_published', 'like', "%$search%")
                    ->orWhere('matter', 'like', "%$search%")
                    ->orWhere('author', 'like', "%$search%");
            })
            ->with('category')
            ->with('subcategory')
            ->orderByDesc('created_at')
            ->paginate(6);

        if (count($contents) >= 1) {
            return view('content.index', compact('contents', 'search'));
        } else {
            $error = "No hay coincidencias con tu búsqueda de '$search'.";
            return view('content.index', compact('contents', 'error'));
        }
    }
}
