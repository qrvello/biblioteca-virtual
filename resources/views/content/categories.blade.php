@extends('layouts.app')

@section('title', 'Categorías')

@section('content')

<section class="page-section bg-info" id="contenido">
    <div class="container">

        {{-- Header de la página --}}

        <h2 class="section-heading text-uppercase">Categorías</h2>
        <h3 class="section-subheading">Lorem ipsum dolor sit amet consectetur.</h3>

        @if ($categories)
        @foreach($categories->chunk(3) as $chunk)
        <div class="card-deck">
            @foreach ($chunk as $category)
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ $category -> title }}</h2>
                    <p class="card-text">Descripción: {{ $category -> description }}</p>
                <h6 class="card-text"><a href="{{action('GuestController@category_show', $category)}}">Ver contenidos</a></h6>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
        {{-- {{ $categories->links() }} --}}
        @endif

        {{-- Paginación --}}

</section>

@endsection
