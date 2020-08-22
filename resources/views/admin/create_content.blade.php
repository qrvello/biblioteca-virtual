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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class=" admin-button card-header">
                                <h3 class="card-title">Listado de contenido</h3>
                                <div>

                                <button type="button" class="btn btn-secondary">
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-up-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path fill-rule="evenodd" d="M4.646 8.354a.5.5 0 0 0 .708 0L8 5.707l2.646 2.647a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 0 0 0 .708z"/>
                                        <path fill-rule="evenodd" d="M8 11.5a.5.5 0 0 0 .5-.5V6a.5.5 0 0 0-1 0v5a.5.5 0 0 0 .5.5z"/>
                                    </svg>
                                </button>
                                </div>
                            </div>
                            <div class="">
                            {{ $contents->links() }}
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Imagen</th>
                                            <th>Titulo</th>
                                            <th>Autor</th>
                                            <th>Categoría</th>
                                            <th>Descripción</th>
                                            <th>Editorial</th>
                                            <th>Archivo</th>
                                            <th>Materia</th>
                                        </tr>
                                    </thead>
                                    @foreach ($contents as $content)
                                        <tbody>
                                            <tr>
                                                <td><img width="100%" class="" src="{{ $content -> image }}" alt="Card image cap"></td>
                                                <td>{{ $content -> title }}</td>
                                                <td>{{ $content -> author }}</td>
                                                <td>{{ $content -> category -> title }}</td>
                                                <td>{{ $content -> description }}</td>
                                                <td>{{ $content -> editorial }}</td>
                                                <td>{{ $content -> file }}</td>
                                                <td>{{ $content -> matter }}</td>
                                                <td class="admin-button">
                                                        <form action="{{ route('content.destroy', $content -> id) }}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE')}}
                                                            <button type="submit" class="btn btn-danger">
                                                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    <button type="button" class="btn btn-secondary">
                                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                    </button>
                                                </td>
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
