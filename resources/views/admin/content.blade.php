@extends('layouts.admin')

@section('title', 'Contenido')

@section('content')

<!-- Content Wrapper. Contains page content -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"></h3>

                        {{-- Cantidad de resultados de la búsqueda --}}
                        @if ($search ?? '')
                        <br>
                        <h3>
                            <div class="card-title" role="alert">
                                Hay {{ $contents->total() }} resultados para tu búsqueda de '{{ $search }}'.
                            </div>
                        </h3>
                        @endif
                        @if ($error ?? '')
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                        @endif
                        <div class="card-tools">
                            <form action="{{ action('AdminController@contents')}}">
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
                </div>
                <div class="card-body table-responsive p-0">
                    {{ $content->links() }}
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Titulo</th>
                                <th>Autor</th>
                                <th>Categoría</th>
                                <th>Descr</th>
                                <th>Editorial</th>
                                <th>Archivo</th>
                                <th>Materia</th>
                                <th>Activo</th>
                                <th>{{-- <a href="{{action('ContentController@show', $content->title)}}">Asc/Desc</a>
                                    --}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($content as $content)
                            <tr>

                                <td>
                                    <a href="" data-toggle="modal" data-target="#contentModal{{$content->id}}">
                                        <img width="100%" class="" src="{{ $content -> image }}" alt="Card image cap">
                                    </a>
                                </td>
                                <td>{{ $content -> title }}</td>
                                <td>{{ $content -> author }}</td>
                                <td>{{ $content -> category -> title }}</td>
                                <td>{{ $content -> description }}</td>
                                <td>{{ $content -> editorial }}</td>
                                <td>{{ $content -> file }}</td>
                                <td>{{ $content -> matter }}</td>
                                <td>@if( $content->active) Sí @else No @endif </td>

                                <td class="admin-button">
                                    <form action="{{ action('ContentController@destroy', $content->id) }}"
                                        method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE')}}
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#exampleModal">
                                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-trash"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Borrar contenido
                                                        </h5>
                                                        <button type="submit" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Desea borrar el contenido?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                            data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>


                                    <a href="{{ action('ContentController@edit', $content->id) }}" type="button"
                                        class="btn btn-secondary">
                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                            class="bi bi-pencil-square" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-secondary" data-toggle="modal"
                                        data-target="#contentModal{{$content->id}}">
                                        <svg width="1.5em" height="1em" viewBox="0 0 16 16" class="bi bi-window"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M14 2H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zM2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z" />
                                            <path fill-rule="evenodd" d="M15 6H1V5h14v1z" />
                                            <path
                                                d="M3 3.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm1.5 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm1.5 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                        </svg>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="contentModal{{$content->id}}" tabindex="-1"
                                        role="dialog" aria-labelledby="" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="">{{ $content -> title }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img width="100%" class="" src="{{ $content -> image }}"
                                                        alt="Card image cap">
                                                </div>
                                                <div class="modal-body">
                                                    Descripción<br>
                                                    {{ $content -> description }}
                                                </div>
                                                <div class="modal-body">
                                                    <ul class="list-inline">
                                                        <li>Fecha: {{$content->created_at->format('d/m/Y')}}</li>
                                                        <li>Autor/a: {{ $content -> author }}</li>
                                                        <li>Editorial: {{ $content -> editorial }}</li>
                                                        <li>Materia: {{ $content -> matter }}</li>
                                                        <li>Categoría: {{ $content -> category -> title }}</li>
                                                    </ul>
                                                </div>
                                                <div class="modal-footer">
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
</section>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->

<script>
    $(function () {
		$("#example1").DataTable({
		"responsive": true,
		"autoWidth": false,
		});
		$('#example2').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		});
	});
</script>
@endsection
