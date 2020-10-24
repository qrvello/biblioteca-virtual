@extends('layouts.app')

@section('title', 'Categorías')

@section('content')

    <section class="page-section" id="contenido">
        <div class="container">

            {{-- Header de la página --}}

            <h2 class="section-heading text-uppercase">Categorías de novedades</h2>
            <h3 class="section-subheading">Material bibliográfico según el sistema de clasificación:
                Obras generales, Filosofía y Psicología, Ciencias sociales, Ciencias naturales, Tecnología, Lengua y
                Literatura, Arte,
                Deporte, Geografía, Historia, biografías.</h3>

            @if (isset($categories))
                @foreach ($categories->chunk(3) as $chunk)
                    <div class="card-deck">
                        @foreach ($chunk as $category)
                            <div class="shadow card mb-3">
                                <div class="card-body d-flex flex-column">
                                    <h2 class="card-title">{{ $category->name }}</h2>
                                    <p class="card-text">{{ $category->description }}</p>
                                    <h6 class="card-text"><a
                                            href="{{ url('/novedades/categoria', $category->id) }}">Ver
                                            novedades</a>
                                    </h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        {{-- $categories->links() --}}
        @endif

        {{-- Paginación --}}

    </section>

@endsection
