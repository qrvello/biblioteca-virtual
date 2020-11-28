<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PublicationCategory;

class Publication extends Model
{
	protected $fillable = [
		'title', 'image', 'description', 'publication_category_id', 'id', 'link', 'yt_link'
	];

	// Relación: una publicación pertenece a una categoría
	public function publication_category()
	{
		return $this->belongsTo(PublicationCategory::class);
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
		}
	}
}
