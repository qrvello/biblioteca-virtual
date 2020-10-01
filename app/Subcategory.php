<?php

namespace App;

use App\Category;
use App\Content;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'title', 'description', 'category_id'
    ];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
