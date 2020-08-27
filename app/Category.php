<?php

namespace App;

use App\Content;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title', 'description',
    ];

    public function contents()
    {
        return $this->hasMany(Contents::class);
    }

}
