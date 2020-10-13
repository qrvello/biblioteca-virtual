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
                        {{-- Cantidad de resultados de la búsqueda --}}
                        @if ($search ?? '')
                        <br>
                        <h3>
                            <div class="card-title" role="alert">
                                Hay {{ $subcategories->total() }} resultados para tu búsqueda de '{{ $search }}'.
                            </div>
                        </h3>
                        @endif
                        @if ($error ?? '')
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                        @endif
                        <div class="card-tools">
                            <form action="{{ url('/admin/categorias')}}">
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
                                @if ($subcategories ?? '')
                                    @foreach ($subcategories as $subcategory)
                                        <tr>
                                            <td>{{$subcategory -> title}}</td>
											<td>{{$subcategory -> description}}</td>
											<td>{{$subcategory -> category -> title}}</td>
                                            <td class="admin-button">

                                                <form action="{{ url('/admin/subcategoria/borrar/'. $subcategory->id) }}"
                                                    method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE')}}
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            		data-target="#confirmacionBorrar">
                                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                                            class="bi bi-trash" fill="currentColor"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd"
                                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg>
													</button>
													<!-- Modal -->
													<x-alert-confirm-delete/>
                                                </form>

                                                <a href="{{ url('/admin/subcategoria/editar/'. $subcategory->id) }}"
                                                    type="button" class="btn btn-secondary">
                                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                                        class="bi bi-pencil-square" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21?? ''a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{$subcategories->links()}}
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
