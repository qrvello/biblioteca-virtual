@extends('layouts.admin')

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
    <div class="container">
        <form class="md-form">
            <div class="file-field">
                <div class="btn btn-primary btn-sm float-left">
                    <span>Choose file</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload your file">
                </div>
            </div>
        </form>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Listado de las categorias</h3>
                            </div>
                            <div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Descripción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($categorys as $category)
                                        <tr>
                                            <td>{{$category -> title}}</td>
                                            <td>{{$category -> description}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://kit.fontawesome.com/1324fa4c3b.js" crossorigin="anonymous"></script>
</body>

@endsection
