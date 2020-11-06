@extends('layouts.admin')

@section('title', 'Contenidos')

@section('content')

<!-- Content Wrapper. Contains page content -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <div class="d-flex">

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
                    <div class="card-body table-responsive p-0">
                        {{ $contents->withQueryString()->links() }}
                        <table class="table table-bordered table-hover">
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
                                <tr>

                                    @if ($content->image)
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#contentModal{{ $content->id }}">
                                            <img class="img-fluid"
                                                src="{{ asset('storage/imagenes/contenido/' . $content->image) }}"
                                                alt="Card image cap">
                                        </a>
                                    </td>
                                    @else
                                    <td></td>
                                    @endif
                                    </td>
                                    <td>{{ $content->title }}</td>
                                    @if ($content->author)
                                    <td>{{ $content->author }}</td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{ $content->description }}</td>
                                    @if ($content->subcategory)
                                    <td>{{ $content->category->title }}</td>
                                    <td>{{ $content->subcategory->title }}</td>
                                    @else
                                    <td>{{ $content->category->title }}</td>
                                    <td></td>
                                    @endif
                                    <td>
                                        @if ($content->active)<span class="badge badge-success">Activo</span>
                                        @else<span class="badge badge-danger">No activo</span> @endif
                                    </td>

                                    <td class="align-items-center">
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

                                        <a href="{{ url('/admin/contenido/editar/' . $content->id) }}" type="button"
                                            class="btn">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn" data-toggle="modal"
                                            data-target="#contentModal{{ $content->id }}">
                                            <i class="fa fa-window-restore" aria-hidden="true"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="contentModal{{ $content->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="">{{ $content->title }}</h2>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if($content->image)
                                                        <img width="100%" class=""
                                                            src="{{ asset('storage/imagenes/contenido/' . $content->image) }}"
                                                            alt="Card image cap">
                                                        @endif
                                                        <div class="modal-body">
                                                            <ul class="list-inline">
                                                                <li>Descripción: {{ $content->description }}</li>
                                                                <li>Fecha de creación:
                                                                    {{ $content->created_at->format('d/m/Y') }}
                                                                </li>
                                                                <li>Fecha de actualización:
                                                                    {{ $content->updated_at->format('d/m/Y') }}
                                                                </li>
                                                                @if($content->author)
                                                                <li>Autor/a: {{ $content->author }}</li>
                                                                @endif
                                                                @if($content->editorial)
                                                                <li>Editorial: {{ $content->editorial }}</li>
                                                                @endif
                                                                @if($content->matter)
                                                                <li>Materia: {{ $content->matter }}</li>
                                                                @endif
                                                                @if ($content->subcategory)
                                                                <li>Subcategoría: {{ $content->subcategory->title }}
                                                                </li>
                                                                @else
                                                                <li>Categoría: {{ $content->category->title }}</li>
                                                                @endif
                                                                @if ($content->description)
                                                                <li>Descripción{{ $content->description }}</li>
                                                                @endif
                                                                @if ($content->editorial)
                                                                <li>Editorial: {{ $content->editorial }}</li>
                                                                @endif
                                                                @if ($content->file)
                                                                <li>Archivo: {{ $content->file }}</li>
                                                                @endif

                                                                @if ($content->matter)
                                                                <li>Materia: {{ $content->matter }}</li>
                                                                @endif

                                                                @if ($content->link)
                                                                <li>Link: {{ $content->link }}</li>
                                                                @endif

                                                                @if ($content->access)
                                                                <li>Acceso: {{ $content->access }}</li>
                                                                @endif

                                                                @if ($content->level)
                                                                <li>Nivel: {{ $content->level }}</li>
                                                                @endif

                                                                @if ($content->cdd)
                                                                <li>CDD {{ $content->cdd }}</li>
                                                                @endif

                                                                @if ($content->isbn)
                                                                <li>{{ $content->isbn }}</li>
                                                                @endif

                                                                @if ($content->access)
                                                                <li>Acceso: {{ $content->access }}</li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

</div>
<!-- /.content-wrapper -->
@endsection
