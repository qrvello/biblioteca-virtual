@extends('layouts.admin')

@section('title', 'Subcategorías')

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
                            @if ($search ?? '')
                                <br>
                                <h3>
                                    <div class="card-title" role="alert">
                                        Hay {{ $subcategories->total() }} resultados para tu búsqueda de '{{ $search }}'.
                                    </div>
                                </h3>
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

                        <!-- /.card -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Titulo</th>
                                        <th>Descripción</th>
                                        <th>Categoría</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($subcategories))
                                        @foreach ($subcategories as $subcategory)
                                            <tr>
                                                <td>{{ $subcategory->title }}</td>
                                                <td>{{ $subcategory->description }}</td>
                                                <td>{{ $subcategory->category->title }}</td>
                                                <td class="admin-button">

                                                    <form
                                                        action="{{ url('/admin/subcategoria/borrar/' . $subcategory->id) }}"
                                                        method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="button" class="btn" data-toggle="modal" data-target="#confirmacionBorrar{{ $subcategory->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        <!-- Modal -->
                                                        <x-alert-confirm-delete :id="$subcategory->id">
                                                            <x-slot name="title">Borrar subcategoría</x-slot>
                                                            <x-slot name="message">¿Desea borrar la categoría?</x-slot>
                                                            <x-slot name="message"> Al borrar la subcategoría se borraran <strong>TODOS</strong> los contenidos que pertenezcan al mismo. ¿Desea borrarlo?</x-slot>
                                                        </x-alert-confirm-delete>
                                                    </form>

                                                    <a href="{{ url('/admin/subcategoria/editar/' . $subcategory->id) }}" type="button" class="btn">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{ $subcategories->links() }}
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- /.card-body -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
