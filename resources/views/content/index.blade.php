@extends('layouts.app')

@section('title', 'Contenido')

@section('content')

<section class="page-section bg-dark" id="contenido">
    <div class="container">

        {{-- Header de la página --}}
        @if ($category ?? '')
        <h2 class="section-heading text-uppercase">{{$category->title}}</h2>
        <h3 class="section-subheading">{{$category->description}}</h3>
        @endif
        {{-- Listado de contenidos --}}
        @if ($search ?? '')
        <div class="alert alert-secondary" role="alert">
            Hay {{ $count_result }} resultados para tu busqueda de '{{ $search }}'.
        </div>
        @elseif($error ?? '')
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
        @endif

        @if ($contents)
        @foreach($contents->chunk(3) as $chunk)
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
                            href="{{action('CategoryController@show', $content -> category -> id)}}">{{ $content -> category -> title }}</a>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
        {{ $contents->links() }}
        @endif

        {{-- Paginación --}}

</section>

@endsection
