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
            <div class="col-md-12 mb-5">
                <p>
                    Según su nombre, una biblioteca es el lugar donde se guardan libros; el nombre quedó desde
                    los tiempos antiguos en que era realmente eso pero en la actualidad, además de sus colecciones
                    bibliográficas, en una biblioteca nos encontramos con audiovisuales, redes informáticas, y
                    puesta en servicio de innumerables medios para satisfacer las necesidades de quienes buscan
                    información,
                    conocimientos nuevos, lecturas recreativas y tantos etcéteras. La llave para entrar a este mundo, un
                    ser humano;
                    en la Escuela 5.
                </p>
                <p>
                    En nuestra escuela, la biblioteca es una parte importante dentro del proyecto institucional:
                    los profesores encuentran en su material un gran apoyo a su práctica pedagógica, los alumnos,
                    todo lo necesario para realizar sus actividades escolares, desarrollar su espíritu crítico,
                    distraerse con lecturas recreativas.
                </p>
                <p>
                    Cuando volvamos a las actividades escolares van a poder acercarse para leer aquí o llevar un libro a
                    casa,
                    estamos de lunes a viernes, por la mañana de 08:00 a 11:30 hs. y a la tarde de 13:30 a 17:00 hs.
                </p>
                <p>
                    Para ser considerado socio se paga una cuota anual lo que permite llevar 2 libros en carácter de
                    préstamo por una semana.
                    Con esta colaboración se acrecienta y actualiza el fondo bibliográfico y se brinda mejor información
                    a toda la institución
                    y a la comunidad.
                </p>
                <p>
                    Las bibliotecarias: En el turno de la mañana está Griselda y Mónica, a la tarde, María Victoria y en
                    el anexo, Nora.
                </p>
            </div>
        </div>

        @if (isset($contents) && count($contents) >= 1)
        <div class="text-center mb-5">
            <h2 class="section-heading text-uppercase">Ultimos libros ingresados</h2>
        </div>
        <div class="card-deck">
            @foreach ($contents as $content)
            <x-card-content :content="$content" />
            @endforeach
        </div>
        @endif

        @if (isset($categories) && count($categories) >= 1)
        @foreach ($categories as $category)
        <div class="text-center my-5">
            <h2 class="section-heading text-uppercase">{{ $category->name }}</h2>
        </div>
        <div class="card-deck">
            @foreach ($category->publications as $publication)
            <x-card-publication :publication="$publication" />
            @endforeach
        </div>
        @endforeach
        @endif

        <div class="text-center mt-5">
            <a href="{{ url('/novedades/categorias') }}" class="btn btn-secondary col-lg-3">Ver todas las novedades</a>
        </div>

        <!-- Servicios-->
        <div class="text-center mt-5">
            <h2 class="section-heading text-uppercase">Contenido</h2>
            <h3 class="section-subheading">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-book fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Libros</h4>
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
<x-modal-content />
@endsection

@section('scripts')
<script src="{{asset('js/modal_content.js')}}"></script>
@endsection