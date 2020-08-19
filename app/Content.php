<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'image', 'file', 'author', 'editorial', 'title', 'description', 'matter',
    ];

    public function scopeAuthor($query, $author)
    {
        if($author)
            return $query->where('author', 'LIKE', "%$author%");
    }
}
