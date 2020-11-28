@extends('layouts.admin')

@section('title', 'Editar categoría')

@section('id', '$content -> id')

@section('content')

<!-- Content Wrapper. Contains page content -->

    <!-- Main content -->
    <form action="{{ url('/admin/categoria/editar/'.$category->id)}}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @method('PUT')
            @csrf
        <section class="content">
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
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control" value="{{ $category -> title }}" name="title">
                            </div>
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" name="description" rows="3">{{ $category -> description }}</textarea>
                            </div>

                        </div>
                        <div class="form-group text-center">
                            <div class="col-12">
                                    <button type="submit" class="btn btn-success col-lg-2">
                                        Guardar
                                    </button>

                                    <a href="{{ url('/admin/categorias')}}" name="button" class="btn btn-danger col-lg-2">
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
        </section>
    </form>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
