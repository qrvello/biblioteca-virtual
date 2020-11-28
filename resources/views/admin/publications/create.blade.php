@extends('layouts.admin')

@section('title', 'Crear publicación')

@section('content')

<!-- Main content -->
<section class="content">
    <form action="{{ url('/admin/publicacion/crear')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
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
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="publication_category_id">Categoría</label>
                            <select class="custom-select @error('publication_category_id') is-invalid @enderror"
                                name="publication_category_id" required>
                                @foreach ($categories as $category)
                                <option value="{{ $category -> id }}">{{ $category -> name }}</option>
                                @endforeach
                            </select>
                            @error('publication_category_id')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Subida de imágenes --}}
                        <div class="form-group col-md-12">
                            <x-upload-image />
                            @error('image')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" value="{{ old('title') }}"
                                class="form-control @error('title') is-invalid @enderror " name="title" required>
                            @error('title')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea
                                required
                                class="form-control @error('description') is-invalid @enderror"
                                name="description"
                                rows="3"
                                placeholder="Descripcion">
                                {{ old('description') }}
                            </textarea>
                            @error('description')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="url" class="form-control" value="{{ old('link') }}" name="link"
                                placeholder="https://www.ejemplo.com.ar">
                        </div>
                        <div class="form-group">
                            <label for="yt_link">Link de video de YouTube</label>
                            <input type="url" class="form-control" name="yt_link" placeholder="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success col-lg-2">
                                Crear
                            </button>

                            <a href="{{ url('/admin/subcategorias')}}" name="button" class="btn btn-danger col-lg-2">
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