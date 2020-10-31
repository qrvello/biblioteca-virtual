<?php

namespace App\Services;

use App\Category;

class CategoryService
{
    public function search($search)
    {
        $categories = Category::orderByDesc('created_at')
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%");
            })
            ->paginate(15);

        return $categories;
    }

}
