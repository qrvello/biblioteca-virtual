@extends('layouts.admin')

@section('title', 'Subir archivos')

@section('content')

<body>
    <link href="{{ asset('css/styles_form.css') }}" rel="stylesheet">
    <div class="container">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h3>Crear nuevo contenido </h3>
                            <form action="{{action('ContentController@store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="file">Archivo</label>
                                    <input type="file" class="form-control" value=" " name="file" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="author">Autor</label>
                                    <input type="text" class="form-control" value=" " name="author" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="editorial">Editorial</label>
                                    <input type="text" class="form-control" value=" " name="editorial" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="title">Titulo</label>
                                    <input type="text" class="form-control" value=" " name="title" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="description">Descripción</label>
                                    <input type="text" class="form-control" value=" " name="description" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="date_published">Fecha de Publicación</label>
                                    <input type="date" class="form-control" value=" " name="date_published" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="image">Imagen</label>
                                    <input type="file" class="form-control" value=" " name="image" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="matter">Materia</label>
                                    <input type="text" class="form-control" value=" " name="matter" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Categoria</label>
                                    <select multiple class="form-control" name="category_id">
                                        @foreach ($categories as $category)
                                    <option value="{{ $category -> id }}">{{ $category -> title }}</option>
                                        @endforeach
                                        {{-- <option value="1">1</option>
                                        <option value="2">2</option> --}}
                                    </select>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="user_id">Usuario que crea el contenido</label>
                                    <select multiple class="form-control" name="user_id">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div> --}}

                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>

                                <a href="{{action('AdminController@contents')}}" name="button" class="btn btn-danger">
                                    Cancelar
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

@endsection
