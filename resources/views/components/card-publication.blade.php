<div class="shadow card mb-3">
    @if ($publication->image)
        <img class="card-img-top" src="{{ asset('/storage/imagenes/publicaciones/' . $publication->image) }}">
    @endif

    <div class="card-body d-flex flex-column">
        <h3 class="card-title">{{ $publication->title }}</h3>
        <p class=card-text>{{ $publication->description }}</p>
    </div>
</div>
