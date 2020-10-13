@extends('layouts.admin')

@section('title', 'Agregar contenido')

@section('content')

<!-- Content Wrapper. Contains page content -->

<!-- Main content -->
<form action="{{ url('/admin/categoria/crear')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
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

                            {{-- Subida de imágenes --}}
                            <div class="form-group col-md-12">
                                <x-upload-image/>
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
                                <input type="text" class="form-control" name="title" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" name="description" rows="2" required></textarea>
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
                                <select class="custom-select" name="category_id" id="select-category" required>
                                    <option value="">Seleccione categoría</option>
                                    @foreach ($categories as $category)
                                       <option value="{{ $category -> id }}">{{ $category -> title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group-col-mb-3">
                                <label for="subcategory_id">Subcategoría</label>
                                <select class="custom-select" name="subcategory_id" id="select-subcategory" disabled="disabled">
                                </select>
                            </div>

                        </div>

                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-success col-lg-2">
                                Crear
                            </button>
                            <a href="{{url('/admin/contenidos')}}" name="button"
                                class="btn btn-danger col-lg-2">
                                Cancelar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</form>

</div>


@endsection
