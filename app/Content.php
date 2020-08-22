<?php

namespace App;

use App\Category;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'image', 'file', 'author', 'editorial', 'title', 'description', 'matter', 'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
