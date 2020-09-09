@extends('layouts.admin')

@section('title', 'Agregar categoria')

@section('content')



    <!-- Main content -->
    <section class="content">
        <form action="{{action('CategoryController@store')}}" method="POST" autocomplete="off">
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
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control" value=" " name="title" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <input type="text" class="form-control" value=" " name="description" placeholder="">
                            </div>

                        </div>
                        <div class="form-group text-center">
                            <div class="col-12">
                                    <button type="submit" class="btn btn-success col-lg-2">
                                        Crear
                                    </button>

                                    <a href="{{action('AdminController@categories')}}" name="button" class="btn btn-danger col-lg-2">
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
