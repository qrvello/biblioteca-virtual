@extends('layouts.admin')

@section('title', 'Categorías')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            {{-- Cantidad de resultados de la búsqueda
                            --}}
                            @if (isset($search))
                                <div class="alert alert-secondary"" role=" alert">
                                    Hay {{ $category->total() }} resultados para tu búsqueda de '{{ $search }}'.
                                </div>
                            @endif
                            @if (isset($error))
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="card-tools">
                                <form action="{{ url('/admin/categorias') }}">
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
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Titulo</th>
                                        <th>Descripción</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $category)
                                        <tr>
                                            <td>{{ $category->title }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td class="admin-button">
                                                @if (!$category->contents->count() && !$category->subcategories->count())
                                                    Hay contenidos
                                                @endif
                                                <form action="{{ url('admin/categoria/borrar/' . $category->id) }}"
                                                    method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="button" class="btn" data-toggle="modal"
                                                        data-target="#confirmacionBorrar{{$category->id}}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <!-- Modal -->
                                                    <x-alert-confirm-delete :id="$category->id">
                                                        <x-slot name="title">Borrar categoría</x-slot>
                                                        <x-slot name="message">Al borrar la categoría se borraran <strong>TODOS</strong>
                                                            los contenidos que pertenezcan al mismo. ¿Desea borrarlo?</x-slot>
                                                    </x-alert-confirm-delete>
                                                    {{-- // TODO arreglar alerta --}}
                                                </form>

                                                <a href="{{ url('admin/categoria/editar/' . $category->id) }}" type="button"
                                                    class="btn">
                                                    <i class="fas fa-edit"></i>
                                                </a>
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
