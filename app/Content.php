<?php

namespace App;

use App\Category;
use App\Subcategory;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'image', 'file', 'author', 'editorial', 'title', 'description', 'matter', 'active', 'category_id', 'subcategory_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    // public function scopeType($query, $type, $search){
    //     if( $type && $search){
    //         return $query-> where($type, 'LIKE', "%$search%");
    //     }
    // }


}
