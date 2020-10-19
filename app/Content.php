<?php

namespace App;

use App\Category;
use App\Subcategory;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'image', 'file', 'author', 'editorial', 'title', 'description', 'matter', 'active', 'category_id', 'subcategory_id', 'link'
    ];

    // Relación: un contenido pertenece a una categoría
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // Relación: un contenido pertenece a una subcategoría
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

}
