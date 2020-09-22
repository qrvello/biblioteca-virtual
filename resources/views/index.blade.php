@extends('layouts.app')

@section('title', 'Biblioteca E.E.S.Nº5')

@section('content')

<header class="masthead">
    <div class="container">
        <div class="masthead-heading">¡Bienvenido/a a nuestra biblioteca digital!</div>
        <div class="masthead-subheading">Escuela de Educación Secundaria N°5 Islas Malvinas</div>
    </div>
</header>

<section class="page-section" id="informacion">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Nuestra biblioteca</h2>
        </div>
        <div class="row text-center">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <h3 class="section-subheading">
                    Según su nombre, una biblioteca es el lugar donde se guardan libros; el nombre quedó desde
                    los tiempos antiguos en que era realmente eso pero en la actualidad, además de sus colecciones
                    bibliográficas, en una biblioteca nos encontramos con audiovisuales, redes informáticas, y
                    puesta en servicio de innumerables medios para satisfacer las necesidades de quienes buscan información,
                    conocimientos nuevos, lecturas recreativas y tantos etcéteras. La llave para entrar a este mundo, un ser humano;
                    en la Escuela 5.
                    <br>
                    En nuestra escuela, la biblioteca es una parte importante dentro del proyecto institucional:
                    los profesores encuentran en su material un gran apoyo a su práctica pedagógica, los alumnos,
                    todo lo necesario para realizar sus actividades escolares, desarrollar su espíritu crítico, distraerse con lecturas recreativas.
                    <br>
                    Cuando volvamos a las actividades escolares van a poder acercarse para leer aquí o llevar un libro a casa,
                    estamos de lunes a viernes, por la mañana de 8 a 11.30 y a la tarde de 13.30 a 17 hs.
                    <br>
                    Para ser considerado socio se paga una cuota anual lo que permite  llevar 2 libros en carácter de préstamo por una semana.
                    Con esta colaboración se acrecienta y actualiza el fondo bibliográfico y se brinda mejor información a toda la institución
                    y a la comunidad.
                    <br>
                    Las bibliotecarias: En el turno de la mañana está Griselda y Mónica, a la tarde, María Victoria y en el anexo, Nora.
                <h3>
            </div>
        </div>
        <!-- <div class="text-center">
            <h3 class="section-subheading">
                Según su nombre, una biblioteca es el lugar donde se guardan libros; el nombre quedó desde
                los tiempos antiguos en que era realmente eso pero en la actualidad, además de sus colecciones
                bibliográficas, en una biblioteca nos encontramos con audiovisuales, redes informáticas, y
                puesta en servicio de innumerables medios para satisfacer las necesidades de quienes buscan información,
                conocimientos nuevos, lecturas recreativas y tantos etcéteras. La llave para entrar a este mundo, un ser humano;
                en la Escuela 5.
                <br>
                En nuestra escuela, la biblioteca es una parte importante dentro del proyecto institucional:
                los profesores encuentran en su material un gran apoyo a su práctica pedagógica, los alumnos,
                todo lo necesario para realizar sus actividades escolares, desarrollar su espíritu crítico, distraerse con lecturas recreativas.
                <br>
                Cuando volvamos a las actividades escolares van a poder acercarse para leer aquí o llevar un libro a casa,
                estamos de lunes a viernes, por la mañana de 8 a 11.30 y a la tarde de 13.30 a 17 hs.
                <br>
                Las bibliotecarias: En el turno de la mañana está Griselda y Mónica, a la tarde, María Victoria y en el anexo, Nora.
            </h3>
            <h3 class="section-subheading"></h3>
        </div> -->
    </div>
</section>
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
                        <p class=card-text>{{ $publication->description}}</p>
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
        <a href="{{ url('publicaciones')}}" class="btn btn-secondary col-lg-3">Ver todas las novedades</a>
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
