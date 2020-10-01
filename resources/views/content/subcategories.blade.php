@extends('layouts.app')

@section('title', 'Categorías')

@section('content')

<section class="page-section" id="contenido">
    <div class="container">

        {{-- Header de la página --}}

    <h2 class="section-heading text-uppercase">Sub Categorías de </h2>
        <h3 class="section-subheading">Material bibliográfico según el sistema de clasificación:
        Obras generales, Filosofía y Psicología, Ciencias sociales, Ciencias naturales, Tecnología, Lengua y Literatura, Arte,
        Deporte, Geografía, Historia, biografías.</h3>
        @if ($subcategories)
                @if( $subcategories->count() <= 3)
                    <div class="card-deck">
                    @foreach ($subcategories as $subcategory)
                        <div class="shadow card mb-3">
                            <div class="card-body">
                                <h2 class="card-title">{{ $subcategory->title }}</h2>
                                <p class="card-text">Descripción: {{ $subcategory->description }}</p>
                                <h6 class="card-text"><a href="{{action('GuestController@subcategory_show', $subcategory->category_id, $subcategory)}}">Ver contenidos</a></h6>
                            </div>
                        </div>
                    @endforeach
                 </div>
                @else
                    @foreach($subcategories->chunk(3) as $subcategories)
                    <div class="card-deck">
                        @foreach ($subcategories as $subcategory)
                        <div class="shadow card mb-3">
                            <div class="card-body">
                                <h2 class="card-title">{{ $subcategory -> title }}</h2>
                                <p class="card-text">Descripción: {{ $subcategory -> description }}</p>
                                <h6 class="card-text"><a href="{{action('GuestController@subcategory_show', $subcategory)}}">Ver
                                        contenidos</a></h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                @endif

        {{-- {{ $subcategories->links() }} --}}
        @endif

        {{-- Paginación --}}

</section>

@endsection
