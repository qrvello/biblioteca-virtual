@extends('layouts.admin')

@section('title', 'Panel administrativo')

    <!-- Content Wrapper. Contains page content -->

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="card-deck text-center">
                        <div class="shadow card mb-3">
                            <div class="card-body">
                                <a href="{{url('/admin/publicacion/crear/')}}">Crear publicación</a>
                            </div>
                        </div>
                        <div class="shadow card mb-3">
                            <div class="card-body">
                                <a href="{{url('/admin/contenido/crear/')}}">Crear contenido</a>
                            </div>
                        </div>
                        <div class="shadow card mb-3">
                            <div class="card-body">
                                <a href="{{url('/admin/categoria/crear/')}}">Crear categoría</a>
                            </div>
                        </div>
                        <div class="shadow card mb-3">
                            <div class="card-body">
                                <a href="{{url('/admin/subcategoria/crear/')}}">Crear subcategoría</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

<!-- /.content-wrapper -->
