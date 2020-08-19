@extends('layouts.app')

@section('title', 'Subir archivos')

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
    <div class="">
        <!-- <form class="md-form">
            <div class="file-field">
                <div class="btn btn-primary btn-sm float-left">
                    <span>Choose file</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload your file">
                </div>
            </div>
        </form> -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Listado de contenido</h3>
                            </div>
                            <div class="">
                                <table id="" class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>Imagen</th>
                                            <th>Titulo</th>
                                            <th>Autor</th>
                                            <th>Descripción</th>
                                            <th>Editorial</th>
                                            <th>Archivo</th>
                                            <th>Materia</th>
                                        </tr>
                                    </thead>
                                    @foreach ($admins as $admin)
                                        <tbody>
                                            <tr>
                                                <td class="card-img"><img class="" src="{{ $admin -> image }}" alt="Card image cap"></td>
                                                <td>{{$admin -> title}}</td>
                                                <td>{{$admin -> author}}</td>
                                                <td>{{ $admin -> description }}</td>
                                                <td>{{ $admin -> editorial }}</td>
                                                <td>{{ $admin -> file }}</td>
                                                <td>{{ $admin -> matter }}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://kit.fontawesome.com/1324fa4c3b.js" crossorigin="anonymous"></script>
</body>

@endsection
