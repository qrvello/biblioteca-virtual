@extends('layouts.app')

@section('title', 'Contenido')

@section('header')

<div class="container">
    <div class="masthead-heading text-uppercase">Contenido</div>
</div>

@endsection

@section('content')

<section class="page-section bg-dark" id="contenido">
    <div class="container">

        {{-- Header de la página --}}
        <h2 class="section-heading text-uppercase">Contenido</h2>
        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>

        {{-- Listado de contenidos --}}

        @if (isset($contents))
            @foreach($contents->chunk(3) as $chunk)
                <div class="card-deck" style="margin-bottom: 15px;">
                    @foreach ($chunk as $content)
                        <div class="card">
                            <img class="card-img-top" src="{{ $content -> image }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $content -> title }}</h5>
                                <h5 class="card-title">{{ $content -> author }}</h5>
                                <h5 class="card-text">{{ $content -> description }}</h5>
                                <p class="card-text">{{ $content -> date_published }}</p>
                                <p class="card-text"><small class="text-muted">{{ $content -> editorial }}</small></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @elseif (isset($error))
            <h1>{{ $error }}</h1>
        @endif
    </div>
</section>


@endsection
