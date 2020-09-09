@extends('layouts.app')

@section('title', 'Contenido')

@section('content')

<section class="page-section bg-info" id="contenido">
    <div class="container">

        {{-- Header de la página SI se muestran contenidos de una categoría específica --}}
        @if ($category ?? '')
            <h2 class="section-heading text-uppercase">{{$category->title}}</h2>
            <h3 class="section-subheading">{{$category->description}}</h3>
        @else
         {{-- Header de la página de contenidos --}}
            <h2 class="section-heading text-uppercase">Contenidos</h2>
            <h3 class="section-subheading">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum erat et dolor pulvinar, in scelerisque ipsum
            dapibus. Maecenas pellentesque commodo ante. Phasellus bibendum lectus at tortor volutpat sagittis.</h3>
        @endif

        {{-- Cantidad de resultados de la búsqueda --}}
        @if ($search ?? '')
            <div class="alert alert-secondary" role="alert">
                Hay {{ $contents->total() }} resultados para tu búsqueda de '{{ $search }}'.
            </div>
        @endif

        {{-- Listado de contenidos --}}
        @if ($contents)
            @forelse($contents->chunk(3) as $chunk)
                <div class="card-deck">
                    @foreach ($chunk as $content)
                        <div class="card">
                            <img class="card-img-top" src="{{ $content -> image }}" alt="Card image cap">
                            <div class="card-body">
                                <h2 class="card-title">{{ $content -> title }}</h2>
                                <h4 class="card-title">Autor/a: {{ $content -> author }}</h4>
                                <h6 class="card-text">Editorial: {{ $content -> editorial }}</h6>
                                <p class="card-text">Descripción: {{ $content -> description }}</p>
                                <p class="card-text">Fecha de publicación: {{ $content -> date_published }}</p>
                                <p class="card-text">Materia: {{ $content -> matter }}</p>
                                <p class="card-text">Categoría: <a
                                        href="{{action('GuestController@category_show', $content -> category -> id)}}">{{ $content -> category -> title }}</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @empty
                {{-- Errores --}}
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforelse

            {{-- Paginación --}}
            {{ $contents->appends(['search' => $search ?? ''])->links() }}
        @endif


</section>

@endsection
