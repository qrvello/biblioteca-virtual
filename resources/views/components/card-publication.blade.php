<div class="shadow card mb-3">
    <a class="portfolio-link" data-toggle="modal" href="#publicacion{{$publication->id}}">
        <img class="card-img-top" src="{{'/imagenes/publicaciones/'.$publication -> image}}">
    </a>
    <div class="card-body">
        <h3 class="card-title">{{ $publication->title }}</h3>
        <p class=card-text>{{ $publication->description}}</p>
    </div>
</div>
