<div class="shadow-sm card mb-3" onclick="modal({{ $publication }}, '{{($publication->created_at)->formatLocalized('%d de %B de %Y') }}')" data-toggle="modal" href="#modal">
    @if ($publication->image)
    <img class="card-img-top" loading="lazy"
        src="{{ asset('/storage/imagenes/publicaciones/' . $publication->image) }}">
    @endif

    <div class="card-body d-flex flex-column">
        <h3 class="card-title">{{ $publication->title }}</h3>
        <p class=card-text>{{ $publication->description }}</p>
        @if ($publication->link)
        <p class="card-text">
            <strong>Link: </strong>
            <a target="_blank" href="{{ $publication->link }}">{{ $publication->link }}</a>
        </p>
        @endif
        <div class="card-text mt-auto">
            <p>
                <strong>{{ ($publication->created_at)->formatLocalized('%d de %B de %Y') }}</strong>
            </p>
            @auth
            <a class="btn btn-outline-dark" href="{{ url('admin/publicacion/editar/' . $publication->id) }}">
                Editar
            </a>
            @endauth
        </div>
    </div>
</div>