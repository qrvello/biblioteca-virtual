<div class="shadow card mb-3">
    <a class="portfolio-link" data-toggle="modal" href="#publicacion{{$publication->id}}">
        <img class="card-img-top" src="{{'/imagenes/contenido/'.$publication -> image}}">
    </a>
    <div class="card-body">
        <h2 class="card-title">{{ $publication->title }}</h2>
        <p class="card-text">{{ $publication->description }}</p>
        <div class="card-text"><strong>{{ $publication->created_at->format('d/m/Y') }}</strong></div>
    </div>
</div>
