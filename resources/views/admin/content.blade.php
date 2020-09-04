@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Contenido</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{action('AdminController@create')}}">Home</a></li>
                        <li class="breadcrumb-item active">Contenido</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Listado de contenido</h3>
                            <div class="card-tools">
                                <!-- <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div> -->
                            </div>
                            <div class="card-tools">
                                <a href="{{ action('ContentController@create')}}">
                                    <button type="button" class="btn btn-secondary">
                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                            class="bi bi-arrow-up-square" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                            <path fill-rule="evenodd"
                                                d="M4.646 8.354a.5.5 0 0 0 .708 0L8 5.707l2.646 2.647a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 0 0 0 .708z" />
                                            <path fill-rule="evenodd"
                                                d="M8 11.5a.5.5 0 0 0 .5-.5V6a.5.5 0 0 0-1 0v5a.5.5 0 0 0 .5.5z" />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        {{ $contents->links() }}
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                            <div class="input-group input-group-sm" style="width: 100px;">
                                                <input type="text" name="table_search" class="form-control float-right"  value="Imagen" >
                                            </div>
                                    </th>
                                    <th>
                                        <div class="input-group input-group-sm" style="width: 100px;">
                                            <input type="text" name="title" class="form-control float-right"  value="Titulo" >
                                        </div>
                                    </th>
                                    <th>
                                        <div class="input-group input-group-sm" style="width: 100px;">
                                            <input type="text" name="table_search" class="form-control float-right"  value="Autor" >
                                        </div>
                                    </th>
                                    <th>
                                        <div class="input-group input-group-sm" style="width: 100px;">
                                            <input type="text" name="table_search" class="form-control float-right"  value="Categoría" >
                                        </div>
                                    </th>
                                    <th>
                                        <div class="input-group input-group-sm" style="width: 100px;">
                                            <input type="text" name="table_search" class="form-control float-right"  value="Descr" >
                                        </div>
                                    </th>
                                    <th>
                                        <div class="input-group input-group-sm" style="width: 100px;">
                                            <input type="text" name="table_search" class="form-control float-right"  value="Editorial" >
                                        </div>
                                    </th>
                                    <th>
                                        <div class="input-group input-group-sm" style="width: 100px;">
                                            <input type="text" name="table_search" class="form-control float-right"  value="Archivo" >
                                        </div>
                                    </th>
                                    <th>
                                        <div class="input-group input-group-sm" style="width: 100px;">
                                            <input type="text" name="table_search" class="form-control float-right"  value="Materia" >
                                        </div>
                                    </th>
                                    <th>
                                    </th>
                                </tr>
                            </thead>
                            @foreach ($contents as $content)
                            <tbody>
                                <tr>
                                    <td><img width="100%" class="" src="{{ $content -> image }}" alt="Card image cap">
                                    </td>
                                    <td>{{ $content -> title }}</td>
                                    <td>{{ $content -> author }}</td>
                                    <td>{{ $content -> category -> title }}</td>
                                    <td>{{ $content -> description }}</td>
                                    <td>{{ $content -> editorial }}</td>
                                    <td>{{ $content -> file }}</td>
                                    <td>{{ $content -> matter }}</td>
                                    <td class="admin-button">
                                        <form action="{{ action('ContentController@destroy', $content -> id) }}"
                                            method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger">
                                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                                    class="bi bi-trash" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd"
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg>
                                            </button>
                                        </form>

                                        <a href="{{ action('ContentController@edit', $content -> id) }}" type="button"
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
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
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
