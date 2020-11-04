<div class="card mb-3">
<a class="portfolio-link" data-toggle="modal" href="#publicacion{{ $publication->id }}">
    @if($publication->image)
    <img class="card-img-top" src="{{ asset('storage/imagenes/publicaciones/'.$publication->image) }}">
    @endif
    <div class="card-body d-flex flex-column">
        <h2 class="card-title">{{ $publication->title }}</h2>
        <p class="card-text">{{ $publication->description }}</p>
        <div class="card-text mt-auto"><strong>{{ $publication->created_at }}</strong></div>
    </div>
</a>
</div>
