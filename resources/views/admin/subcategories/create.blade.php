@extends('layouts.admin')

@section('title', 'Agregar Subcategoría')

@section('content')

    <!-- Main content -->
    <section class="content">
        <form action="{{ url('/admin/subcategoria/crear')}}" method="POST" autocomplete="off">
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
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category_id">Categoría</label>
                                <select class="custom-select" name="category_id" required>
                                    @foreach ($categories as $category)
                                            <option value="{{ $category -> id }}">{{ $category -> title }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Subcategoría" required>
                                @error('title')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3" placeholder="Descripción" required>{{ old('description') }}</textarea>
                                @error('description')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
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
