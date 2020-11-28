@extends('layouts.admin')

@section('title', 'Editar contenido')

@section('id', '$content -> id')

@section('content')

<!-- Content Wrapper. Contains page content -->

<!-- Main content -->
<form action="{{ url('/admin/contenido/editar/' . $content->id) }}" method="POST" autocomplete="off"
    enctype="multipart/form-data">
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
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" @if ($content->active)
                                            checked="checked" @endif
                                            name="active" value="1">
                                        </div>
                                    </div>
                                    <label for="active" class="form-control">
                                        Mostrar contenido
                                    </label>
                                </div>
                            </div>
                            {{-- Edición/Subida de imágen --}}
                            @if ($content->image)
                            <div class="form-group col-md-4">
                                <img src="{{ asset('storage/imagenes/contenido/' . $content->image) }}" width="100%">
                            </div>
                            <div class="form-group col-md-6 my-auto">
                                <a class="btn btn-outline-danger" id="{{$content->id}}" onclick="event.preventDefault();
                                document.getElementById('delete-image-form').submit();">Borrar imagen</a>
                            </div>

                            @endif
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    @if ($content->image)
                                    <label for="image">Imagen</label>
                                    <input type="file" name="image" accept="image/png, image/jpeg">
                                    @error('image')
                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                    @enderror
                                    @else
                                    <x-upload-image />
                                    @error('image')
                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                    @enderror
                                    @endif
                                </div>
                            </div>
                            @if($content->file)
                            <div class="form-group col-md-3">
                                <label> Archivo: </label>
                                <p>{{ $content->file }}</p>
                            </div>

                            <div class="form-group col-md-3 my-auto">
                                <a class="btn btn-outline-danger" id="{{$content->id}}"
                                    onclick="event.preventDefault();
                                                                                            document.getElementById('delete-file-form').submit();">Borrar archivo</a>
                            </div>
                            @else
                            <div class="form-group col-md-6">
                                <label for="file">Archivo</label>
                                <input type="file" class="form-control" value="{{ $content->file }} " name="file">
                                @error('file')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>
                            @endif

                            <div class="form-group col-md-6">
                                <label for="author">Autor</label>
                                <input type="text" class="form-control" value="{{ $content->author }}" name="author">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="editorial">Editorial</label>
                                <input type="text" class="form-control" value="{{ $content->editorial }}" placeholder="Santillana" name="editorial">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="link">Link</label>
                                <input type="url" class="form-control" value="{{ $content->link }}" placeholder="https://web.biblioteca-eesn5.com.ar/" name="link">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="yt_link">Link de video de YouTube</label>
                                <input type="url" class="form-control" placeholder="https://www.youtube.com/watch?v=dQw4w9WgXcQ" @if($content->yt_link) value="{{ 'https://www.youtube.com/watch?v='.$content->yt_link }}" @endif name="yt_link">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="title">Título</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ $content->title }} " name="title" required>
                                @error('title')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="description">Descripción</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    name="description" rows="3">{{ $content->description }}</textarea>
                                @error('description')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="date_published">Fecha de Publicación</label>
                                <input type="date" class="form-control"
                                    value="{{ \Carbon\Carbon::parse($content->date_published)->format('Y-m-d') }}"
                                    name="date_published">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="matter">Materia</label>
                                <input type="text" class="form-control" value="{{ $content->matter }}" name="matter">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="level">Nivel</label>
                                <input type="text" class="form-control" value="{{ $content->level }}" name="level">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cdd">CDD</label>
                                <input type="text" class="form-control" value="{{ $content->cdd }}" name="cdd">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="isbn">ISBN</label>
                                <input type="text" class="form-control" value="{{ $content->isbn }}" name="isbn">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="matter">Acceso</label>
                                <input type="text" class="form-control" value="{{ $content->access }}" name="access">
                            </div>
                            <div class="form-group col-mb-6">
                                <label for="category_id">Categoría</label>
                                <select class="custom-select @error('category_id') is-invalid @enderror"
                                    name="category_id" id="select-category">
                                    @foreach ($categories as $category)
                                    <option @if ($category->id === $content->category_id) selected
                                        @endif
                                        value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-mb-6">
                                <label for="subcategory_id">Subcategoría</label>
                                <select @if (!$content->subcategory) disabled="disabled"
                                    @endif class="custom-select"
                                    value="{{ $content->subcategory_id ?? '' }}" name="subcategory_id"
                                    id="select-subcategory">
                                    @foreach ($subcategories as $subcategory)
                                    <option @if ($subcategory->id == $content->subcategory_id) selected
                                        @endif
                                        value="{{ $subcategory->id }}">{{ $subcategory->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-success col-lg-2">
                                Guardar
                            </button>
                            <a href="{{ url('/admin/contenidos') }}" name="button" class="btn btn-danger col-lg-2">
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
<form id="delete-image-form" action="{{ url('/admin/contenido/borrar/imagen/'.$content->id) }}" method="POST">
    @csrf
</form>
<form id="delete-file-form" action="{{ url('/admin/contenido/borrar/archivo/'.$content->id) }}" method="POST">
    @csrf
</form>

@endsection