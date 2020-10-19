<div class="card mb-3 shadow">
    <a class="portfolio-link" data-toggle="modal" href="#contenido{{ $content->id }}">

        @if ($content->image)
            <img loading="lazy" class="card-img-top" src="{{ '/storage/imagenes/contenido/' . $content->image }}">
        @endif

    </a>

    <div class="card-body d-flex flex-column">

        <a class="portfolio-link" data-toggle="modal" href="#contenido{{ $content->id }}">

            <h1 class="card-title">{{ $content->title }}</h1>

            @if ($content->author)
                <p class="card-text"><strong>Autor/a: </strong>{{ $content->author }}</p>
            @endif

            @if ($content->editorial)
                <p class="card-text"><strong>Editorial: </strong>{{ $content->editorial }}</p>
            @endif
            <p class="card-text mb-3">{{ $content->description }}</p>

        </a>

        @if ($content->matter)
            <p class="card-text"><strong>Materia:</strong> {{ $content->matter }}</p>
        @endif

        <p class="card-text">
            <strong>Categoría:</strong>
            <a href="{{ action('GuestController@category_show', $content->category_id) }}">
                {{ $content->category->title }}
            </a>
        </p>

        @if ($content->subcategory)

            <p class="card-text">
                <strong>Categoría:</strong>
                <a href="{{ action('GuestController@subcategory_show', $content->subcategory_id) }}">
                    {{ $content->subcategory->title }}
                </a>
            </p>

        @endif

        @if ($content->link)
            <p class="card-text">
                <strong>Link: </strong>
                <a target="_blank" href="{{ $content->link }}">{{ $content->link }}</a>
            </p>
        @endif

        <div class="mt-auto">
            @auth
                <h3 class="card-text">
                    <a href="{{ url('admin/contenido/editar/' . $content->id) }}">
                        <strong>Editar</strong>
                    </a>
                </h3>

            @endauth
            @if ($content->file)
                <p class="card-text"><strong><a href={{ url('descargar/' . $content->id) }}>Descargar</a></strong></p>
            @endif
        </div>

    </div>
</div>
