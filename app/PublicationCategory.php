<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Publication;
class PublicationCategory extends Model
{
    protected $table = 'publications_categories';

    protected $fillable = [
        'name',
    ];

    // Relación: una categoría tiene muchos subcategorías
    public function subcategories()
    {
        return $this->hasMany(Publication::class);
    }
}
