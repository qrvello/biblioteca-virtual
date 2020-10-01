@extends('layouts.app')

@section('title', 'Categorías')

@section('content')

<section class="page-section" id="contenido">
    <div class="container">

        {{-- Header de la página --}}

        <h2 class="section-heading text-uppercase">Categorías</h2>
        <h3 class="section-subheading">Material bibliográfico según el sistema de clasificación:
            Obras generales, Filosofía y Psicología, Ciencias sociales, Ciencias naturales, Tecnología, Lengua y
            Literatura, Arte,
            Deporte, Geografía, Historia, biografías.</h3>

        @if ($categories)
        @foreach($categories->chunk(3) as $chunk)
        <div class="card-deck">
            @foreach ($chunk as $category)
                <x-card-category :category="$category" />
            @endforeach
        </div>
        @endforeach
            {{ $categories->links() }}
        @endif

        {{-- Paginación --}}

</section>

@endsection
