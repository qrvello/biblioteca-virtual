@extends('layouts.admin')

@section('title', 'Agregar contenido')

@section('content')

<!-- Content Wrapper. Contains page content -->

<!-- Main content -->
<form action="{{action('ContentController@store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
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
                            {{-- <input class="form-checkbox" type="checkbox" name="active">
                                <label for="active">
                                    Mostrar contenido
                                </label> --}}
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="active"
                                                aria-label="Checkbox for following text input">
                                        </div>
                                    </div>
                                    <label for="active" class="form-control" aria-label="Text input with checkbox">
                                        Mostrar contenido
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="file-upload">
                                    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Agregar imagen</button>

                                    <div class="image-upload-wrap">
                                        <input class="file-upload-input" type="file" name="image" onchange="readURL(this);" accept="image/*" />
                                        <div class="drag-text">
                                            <h3>Arrastra y suelta una imagen o seleccionala</h3>
                                        </div>
                                    </div>
                                    <div class="file-upload-content">
                                        <img class="file-upload-image" src="#" alt="your image" />
                                        <div class="image-title-wrap">
                                            <button type="button" onclick="removeUpload()" class="remove-image">Borrar <span
                                                    class="image-title">Imagen subida</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="file">Archivo</label>
                                <input type="file" class="form-control" name="file">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="author">Autor</label>
                                <input type="text" class="form-control" name="author">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="editorial">Editorial</label>
                                <input type="text" class="form-control" name="editorial">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="title">Título</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" name="description" rows="2"></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date_published">Fecha de Publicación</label>
                                <input type="date" class="form-control" name="date_published">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="matter">Materia</label>
                                <input type="text" class="form-control" name="matter">
                            </div>
                            <div class="form-group col-mb-3">
                                <label for="category_id">Categoría</label>
                                <select class="custom-select" name="category_id" id="select-category">
                                    <option value="">Seleccione categoría</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category -> id }}">{{ $category -> title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group-col-mb-3">
                                <label for="subcategory_id">Subcategoría</label>
                                <select class="custom-select" name="subcategory_id" id="select-subcategory" disabled="disabled">
                                    <option value="">Seleccione subcategoría</option>
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
                    <!-- /.card -->
                </div>
            </div>
    </section>
</form>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
