@extends('layouts.admin')

@section('title', 'Administrador')

@section('header')

<div class="container">
    <div class="masthead-heading text-uppercase">Registrarse</div>
</div>

@endsection

@section('content')

<br>

<body>
    <link href="{{ asset('css/styles_form.css') }}" rel="stylesheet">
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Panel Administrativo</h2>
                    <h3 class="section-subheading text-muted">Creá, editá o borrá.</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-6">
                        <a href="{{ action('AdminController@categories') }}">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-book fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="my-3">Categorías</h4>
                        </a>
                            <p class="text-muted">Creá, editá o borrá las categorías que querés.</p>
                    </div>
                    <div class="col-md-6">
                        <a href="{{action('AdminController@contents')}}">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-university fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Contenido</h4>
                        </a>
                        <p class="text-muted">Creá, editá o borrá el contenido que querés.</p>
                    </div>

                </div>
            </div>
        </section>

</body>

@endsection
