<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    public function scopeAuthor($query, $author)
    {
        if($author)
            return $query->where('author', 'LIKE', "%$author%");
    }
}
