<?php

namespace App;

use App\Content;
use App\Subcategory;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = [
		'title', 'description',
    ];

    // Relación: una categoría tiene muchos contenidos
	public function contents()
	{
		return $this->hasMany(Content::class);
    }

    // Relación: una categoría tiene muchos subcategorías
	public function subcategories()
	{
		return $this->hasMany(Subcategory::class);
	}

}
