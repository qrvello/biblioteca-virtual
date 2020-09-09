@extends('layouts.app')

@section('title', 'Biblioteca E.E.S.Nº5')

@section('content')

<header class="masthead">
    <div class="container">
        <div class="masthead-heading text-uppercase">¡Bienvenido a nuestra biblioteca digital!</div>
        <div class="masthead-subheading">Escuela de Educación Secundaria N°5 ISLAS MALVINAS</div>
    </div>
</header>

{{-- Novedades --}}
<section class="page-section bg-white" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Novedades</h2>
            <h3 class="section-subheading">Aquí se encuentran las entradas más recientes de la página.</h3>
        </div>
        <div class="row">
            @foreach ($publications as $publication)
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <img class="img-fluid" src="{{ $publication->image }}" alt="">
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">{{ $publication->title }}</div>
                        <div class="portfolio-caption-subheading">{{ $publication->description}}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <center>
            <a href="{{ url('publicaciones')}}" class="btn btn-primary col-lg-3">Ver todas las novedades</a>
        </center>
</section>

<!-- Services-->
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Contenido</h2>
            <h3 class="section-subheading">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-book fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Audiolibros y libros electrónicos</h4>
                <p class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                    architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-university fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Material de estudio</h4>
                <p class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                    architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-play-circle fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Videos</h4>
                <p class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                    architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
        </div>
    </div>
</section>
@endsection
