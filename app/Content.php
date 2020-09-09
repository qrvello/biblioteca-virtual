<?php

namespace App;

use App\Category;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'image', 'file', 'author', 'editorial', 'title', 'description', 'matter', 'active', 'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    // public function scopeType($query, $type, $search){
    //     if( $type && $search){
    //         return $query-> where($type, 'LIKE', "%$search%");
    //     }
    // }


}
