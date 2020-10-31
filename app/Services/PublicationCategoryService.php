<?php

namespace App\Services;

class PublicationCategoryService
{
    public function getLastPublications($categories)
    {
        foreach ($categories as $category) {
            $category->setRelation(
                'publications',
                $category->publications()
                    ->orderBy('created_at', 'desc')
                    ->take(3)
                    ->get()
            );
        }
        return $categories;
    }
}
