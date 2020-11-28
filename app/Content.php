<?php

namespace App;

use App\Category;
use App\Subcategory;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'image', 'file', 'author', 'editorial', 'title', 'description', 'matter', 'active', 'category_id', 'subcategory_id', 'link', 'isbn', 'level', 'access', 'cdd', 'yt_link'
    ];

    // Relación: un contenido pertenece a una categoría
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relación: un contenido pertenece a una subcategoría
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    // Obtiene la key del link y lo guarda en el campo yt_link
    public function setYtlinkAttribute($value)
    {

        $pattern =
            '%^# Match any YouTube URL
        (?:https?://)?  # Optional scheme. Either http or https
        (?:www\.)?      # Optional www subdomain
        (?:             # Group host alternatives
          youtu\.be/    # Either youtu.be,
        | youtube\.com  # or youtube.com
          (?:           # Group path alternatives
            /embed/     # Either /embed/
          | /v/         # or /v/
          | /watch\?v=  # or /watch\?v=
          )             # End path alternatives.
        )               # End host alternatives.
        ([\w-]{10,12})  # Allow 10-12 for 11 char YouTube id.
        $%x';

        $result = preg_match($pattern, $value, $matches);
        if ($result) {
            $this->attributes['yt_link'] = $matches[1];
        } else {
            $this->attributes['yt_link'] = null;
            return back()->with('status', 'El link proporcionado no es de YouTube.');
        }
    }
}
