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

    // Relación: una subcategoría tiene muchos contenidos
    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    // Relación: una subcategoría pertenece a una categoría
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
