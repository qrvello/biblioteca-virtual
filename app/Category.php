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

	public function contents()
	{
		return $this->hasMany(Content::class);
	}

	public function subcategories()
	{
		return $this->hasMany(Subcategory::class);
	}

}
