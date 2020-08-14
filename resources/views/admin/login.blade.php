@extends('layouts.app')

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
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Iniciar como Administrador</h5>
                        <form class="form-signin">
                            <div class="form-label-group">
                                <input type="email" id="nombre" class="form-control" placeholder="Marcos" autofocus>
                                <label for="nombre">Usuario</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="password" class="form-control" placeholder="Contraseña">
                                <label for="inputPassword">Contraseña</label>
                            </div>
                            <hr class="my-4">
                            <a class="btn btn-lg btn-secondary btn-block text-uppercase" href="#">Iniciar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/1324fa4c3b.js" crossorigin="anonymous"></script>
</body>

@endsection
