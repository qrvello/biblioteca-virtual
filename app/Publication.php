<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\PublicationCategory;
class Publication extends Model
{
    protected $fillable = [
        'title', 'image', 'description',
    ];

    // Relación: una publicación pertenece a una categoría
    public function publication_category()
    {
        return $this->belongsTo(PublicationCategory::class);
    }
}
