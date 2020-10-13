@extends('layouts.app')

@section('title', 'Categorías')

@section('content')

<section class="page-section" id="contenido">
    <div class="container">

        {{-- Header de la página --}}

        <h2 class="section-heading">Subcategorías de {{ $category->title ?? ''}}</h2>
        <h3 class="section-subheading">Material bibliográfico según el sistema de clasificación:
            Obras generales, Filosofía y Psicología, Ciencias sociales, Ciencias naturales, Tecnología, Lengua y
            Literatura, Arte,
            Deporte, Geografía, Historia, biografías.</h3>

        @if($subcategories)
            @foreach($subcategories->chunk(3) as $subcategories)
                <div class="card-deck">
                    @foreach ($subcategories as $subcategory)
                        <x-card-subcategories :subcategory="$subcategory" />
                    @endforeach
                </div>
            @endforeach
        @endif

        {{-- Paginación --}}
        @if($subcategories->count() > 9)
            {{ $subcategories->links() }}
        @endif


</section>

@endsection
