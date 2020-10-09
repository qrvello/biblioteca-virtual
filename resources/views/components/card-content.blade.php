<div class="shadow card mb-3">
    <a class="portfolio-link" data-toggle="modal" href="#contenido{{$content->id}}">
        <img class="card-img-top" src="{{ 'imagenes/contenido/'.$content -> image }}">

        <div class="card-body">
            <h1 class="card-title">{{ $content -> title }}</h1>
            <p class="card-text"><strong>Autor/a: </strong>{{ $content -> author }}</p>
            <p class="card-text"><strong>Editorial: </strong>{{ $content -> editorial }}</p>
            <p class="card-text">{{ $content -> description }}</p>
            @if($content->matter)
            <p class="card-text"><strong>Materia:</strong> {{ $content -> matter }}</p>
            @endif
        </a>
            <p class="card-text">
                @if($content->subcategory)
                <strong>Subcategoría:</strong> <a class="card-link"
                    href="{{action('GuestController@subcategory_show', $content->subcategory_id)}}">
                    {{ $content -> subcategory -> title }} </a>
                @else
                <strong>Categoría:</strong> <a class="card-link" href="{{action('GuestController@category_show', $content->category_id)}}">
                    {{ $content -> category -> title }} </a>
                @endif
            </p>
            <p class="card-text"><strong>{{ $content->created_at->format('d/m/Y')}}</strong></p>

        </div>
</div>
