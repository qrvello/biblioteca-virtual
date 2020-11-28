@extends('layouts.admin')

@section('title', 'Publicaciones')

@section('content')
<!-- Content Wrapper. Contains page content -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                        <div class="card-tools">
                            <form action="{{ url('/admin/publicaciones') }}">
                                <div class="input-group input-group-sm float-right">
                                    <input type="text" name="search" class="form-control ">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Titulo</th>
                                    <th>Descripción</th>
                                    <th>Categoría</th>
                                    <th>Link</th>
                                    <th>Link de Youtube</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($publications as $publication)
                                <tr>
                                    @if ($publication->image)
                                    <td>
                                        <img class="img-fluid"
                                            src="{{ asset('storage/imagenes/publicaciones/' . $publication->image) }}"
                                            alt="Card image cap">
                                    </td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{ $publication->title }}</td>
                                    <td>{{ $publication->description }}</td>
                                    <td>{{ $publication->publication_category->name }}</td>
                                    <td><a href="{{ $publication->link }}">{{ $publication->link }}</a></td>
                                    <td>
                                        @if($publication->link)
                                            <a
                                            href="{{ 'https://www.youtube.com/watch?v='.$publication->yt_link }}">{{ 'https://www.youtube.com/watch?v='.$publication->yt_link }}</a>
                                        @endif
                                    </td>
                                    <td class="admin-button">
                                        <form action="{{ url('admin/publicacion/borrar/' . $publication->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn" data-toggle="modal"
                                                data-target="#confirmacionBorrar{{$publication->id}}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <!-- Modal -->
                                            <x-alert-confirm-delete :id="$publication->id">
                                                <x-slot name="title">Borrar publicación</x-slot>
                                                <x-slot name="message">¿Desea borrar la publicación?</x-slot>
                                            </x-alert-confirm-delete>
                                        </form>
                                        <a href="{{ url('admin/publicacion/editar/' . $publication->id) }}"
                                            type="button" class="btn">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection