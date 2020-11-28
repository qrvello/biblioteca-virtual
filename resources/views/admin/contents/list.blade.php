@extends('layouts.admin')

@section('title', 'Contenidos')

@section('content')

<!-- Content Wrapper. Contains page content -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        @if (isset($search))
        {{-- Cantidad de resultados de la búsqueda
                --}}
        <div class="alert alert-info align-middle" role="alert">
            Hay {{ $contents->total() }} resultados para tu búsqueda de '{{ $search }}'.
        </div>

        @endif

        @if (isset($error))
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
        @endif

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <div class="d-flex">


                            <div class="ml-auto col-md-4 p-2">
                                <form action="{{ url('/admin/contenidos') }}">
                                    <div class="input-group input-group-sm float-right mb-2">
                                        <div class="input-group input-group-sm float-right mb-2">
                                            <select class="custom-select" name="orderby">
                                                <option selected disabled>Orden</option>
                                                <option value="asc">Ascendente</option>
                                                <option value="desc">Descendente</option>
                                            </select>
                                            <select class="custom-select" name="order">
                                                <option selected disabled>Por</option>
                                                <option value="title">Titulo</option>
                                                <option value="category_id">Categoria</option>
                                                <option value="matter">Materia</option>
                                                <option value="author">Autor</option>
                                                <option value="created_at">Fecha de creación</option>
                                                <option value="updated_at">Fecha de actualización</option>
                                                <option value="access">Acceso</option>
                                            </select>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    Ordenar</button>
                                            </div>
                                        </div>
                                        <input type="text" name="search" class="form-control ">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="justify-content-center">
                        {{ $contents->withQueryString()->links() }}

                    </div>
                    <table class="table table-bordered table-hover">
                        <div class="card-body table-responsive p-0">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Titulo</th>
                                    <th>Autor</th>
                                    <th>Descr</th>
                                    <th>Categoría</th>
                                    <th>Subcategoría</th>
                                    <th>Activo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($contents as $content)
                                <tr
                                    onclick="modal( {{ $content}} , '{{ Carbon\Carbon::parse($content->date_published)->format('d/m/Y')}}', true )">

                                    @if ($content->image)
                                    <td data-toggle="modal" data-target="#modal">
                                        <img class="img-fluid"
                                            src="{{ asset('storage/imagenes/contenido/' . $content->image) }}"
                                            alt="Card image cap">
                                        </a>
                                    </td>
                                    @else
                                    <td data-toggle="modal" data-target="#modal"></td>
                                    @endif
                                    </td>
                                    <td data-toggle="modal" data-target="#modal">{{ $content->title }}</td>
                                    @if ($content->author)
                                    <td data-toggle="modal" data-target="#modal">{{ $content->author }}</td>
                                    @else
                                    <td data-toggle="modal" data-target="#modal"></td>
                                    @endif
                                    <td data-toggle="modal" data-target="#modal">{{ $content->description }}</td>
                                    @if ($content->subcategory)
                                    <td data-toggle="modal" data-target="#modal">{{ $content->category->title }}</td>
                                    <td data-toggle="modal" data-target="#modal">{{ $content->subcategory->title }}</td>
                                    @else
                                    <td data-toggle="modal" data-target="#modal">{{ $content->category->title }}</td>
                                    <td data-toggle="modal" data-target="#modal"></td>
                                    @endif
                                    <td data-toggle="modal" data-target="#modal">
                                        @if ($content->active)<span class="badge badge-success">Activo</span>
                                        @else<span class="badge badge-danger">No activo</span> @endif
                                    </td>

                                    <td class="my-auto">
                                        <form action="{{ url('/admin/contenido/borrar/' . $content->id) }}"
                                            method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="button" class="btn" data-toggle="modal"
                                                data-target="#confirmacionBorrar{{ $content->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <!-- Modal -->
                                            <x-alert-confirm-delete :id="$content->id">
                                                <x-slot name="title">Borrar contenido</x-slot>
                                                <x-slot name="message">¿Desea borrar el contenido ?</x-slot>
                                            </x-alert-confirm-delete>
                                        </form>

                                        <span class="">
                                            <a href="{{ url('/admin/contenido/editar/' . $content->id) }}" type="button"
                                                class="btn">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- /.content -->
<x-modal-content />
</div>
<!-- /.content-wrapper -->
@endsection

@section('scripts')
<script src="{{asset('js/modal_content.js')}}"></script>
@endsection