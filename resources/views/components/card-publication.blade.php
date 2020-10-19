<div class="shadow card mb-3">
    <a class="portfolio-link" data-toggle="modal" href="#publicacion{{ $publication->id }}">
        @if ($publication->image)
            <img class="card-img-top" src="{{ '/storage/imagenes/publicaciones/' . $publication->image }}">
        @endif
    </a>
    <div class="card-body">
        <h3 class="card-title">{{ $publication->title }}</h3>
        <p class=card-text>{{ $publication->description }}</p>
    </div>
</div>
