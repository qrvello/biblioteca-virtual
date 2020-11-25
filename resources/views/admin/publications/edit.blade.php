@extends('layouts.admin')

@section('title', 'Editar publicación')

@section('content')

<!-- Main content -->
<section class="content">
    <form action="{{ url('/admin/publicacion/editar/' . $publication->id) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row justify-content-md-center">

            <div class="col-md-11">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
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
                        <div class="form-group">
                            <label for="publication_category_id">Categoría</label>
                            <select required class="custom-select @error('publication_category_id') is-invalid @enderror" name="publication_category_id">
                                {{-- Foreach de las categorías, dejando seleccionada la que ya tenía --}}
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id ==
                                    $publication->publication_category_id)
                                    selected
                                    @endif
                                    >

                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- Edición/Subida de imágen --}}
                        @if ($publication->image)
                        <div class="form-group col-md-3">
                            <img class="img-fluid" src="{{ asset('storage/imagenes/publicaciones/' . $publication->image) }}"
                                width="100%">
                        </div>
                        <div class="form-group col-md-9">
                            <label for="image">Imagen</label>
                            <input type="file" name="image">
                        </div>
                        @error('image')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                        @else
                        <div class="form-group col-md-12">
                            <x-upload-image />
                            @error('image')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" class="form-control" name="title" value="{{ $publication->title }}"
                                placeholder="Título" required>
                                @error('title')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea required
                                class="form-control @error('description') is-invalid @enderror"
                                name="description"
                                rows="3"
                                placeholder="Descripción">{{ $publication->description }}</textarea>
                                @error('description')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" value="{{ $publication->link }}" name="link"
                                placeholder="https://www.ejemplo.com.ar">
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success col-lg-2">
                                Guardar
                            </button>

                            <a href="{{ url('/admin/subcategorias') }}" name="button" class="btn btn-danger col-lg-2">
                                Cancelar
                            </a>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        </div>
    </form>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection