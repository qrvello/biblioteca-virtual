@extends('layouts.admin')

@section('title', 'Editar contenido')

@section('id', '$content -> id')

@section('content')

<!-- Content Wrapper. Contains page content -->

    <!-- Main content -->
    <form action="{{action('ContentController@update', $content -> id )}}" method="POST"autocomplete="off" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" @if ($content->active) checked="checked" @endif name="active">
                                        </div>
                                    </div>
                                    <label for="active" class="form-control">
                                        Mostrar contenido
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><img
                                                src="{{ asset('assets/upload.svg')}}"></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Elegir imagen</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="file">Archivo</label>
                                <input type="file" class="form-control" value="{{ $content -> file }} " name="file">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="author">Autor</label>
                                <input type="text" class="form-control" value="{{ $content -> author }} " name="author">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="editorial">Editorial</label>
                                <input type="text" class="form-control" value="{{ $content -> editorial}} " name="editorial">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="title">Título</label>
                                <input type="text" class="form-control" value="{{ $content -> title }} " name="title">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" name="description" rows="3">{{ $content -> description }}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date_published">Fecha de Publicación</label>
                                <input type="date" class="form-control" value="{{ $content ->  date_published}} " name="date_published">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="image">Imagen</label>
                                <input type="file" class="form-control" value="{{ $content -> image }} " name="image">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="matter">Materia</label>
                                <input type="text" class="form-control" value="{{ $content -> matter }} " name="matter">
                            </div>
                            <div class="form-group col-mb-6">
                                <label for="category_id">Categoria</label>
                                <select class="custom-select " value="{{ $content -> category_id}} " name="category_id">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category -> id }}">{{ $category -> title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-success col-lg-2">
                                Crear
                            </button>
                            <a href="{{action('AdminController@contents')}}" name="button"
                                class="btn btn-danger col-lg-2">
                                Cancelar
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>

    </section>
    </form>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
