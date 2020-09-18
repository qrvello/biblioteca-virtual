@extends('layouts.app')

@section('title', 'Biblioteca E.E.S.Nº5')

@section('content')

<header class="masthead">
    <div class="container">
        <div class="masthead-heading">¡Bienvenido/a a nuestra biblioteca digital!</div>
        <div class="masthead-subheading">Escuela de Educación Secundaria N°5 Islas Malvinas</div>
    </div>
</header>

{{-- Novedades --}}
<section class="page-section" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Novedades</h2>
            <h3 class="section-subheading">Aquí se encuentran las entradas más recientes de la página.</h3>
        </div>
        <div class="card-deck">
            @forelse($publications->chunk(3) as $chunk)
            <div class="card-deck">
                @foreach ($chunk as $publication)
                <div class="card mb-3">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal{{$publication->id}}">
                        <img class="card-img-top" src="{{ $publication->image }}" alt="">
                    </a>
                    <div class="card-body">
                        <h3 class="card-title">{{ $publication->title }}</h3>
                        <p>{{ $publication->description}}</p>
                    </div>



                <div class="portfolio-modal modal fade" id="portfolioModal{{$publication->id}}" tabindex="-1"
                    role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg"
                                    alt="Close modal" />
                            </div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="modal-body">
                                            <!-- Project Details Go Here-->
                                            <h2 class="text-uppercase">{{$publication->title}}</h2>
                                            <p class="item-intro text-muted"></p>
                                            <img class="img-fluid d-block mx-auto" src="{{$publication->image}}"
                                                alt="" />
                                            <p>{{$publication->description}}</p>
                                            <ul class="list-inline">
                                                <li>Fecha: {{$publication->created_at->format('d/m/Y')}}</li>
                                            </ul>
                                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                                <i class="fas fa-times mr-1"></i>
                                                Cerrar publicación
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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
