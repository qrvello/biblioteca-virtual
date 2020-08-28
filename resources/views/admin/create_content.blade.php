@extends('layouts.adminlte')

@section('content')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
			<h1>Project Add</h1>
			</div>
			<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active">Project Add</li>
			</ol>
			</div>
		</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
		<div class="col-md-6">
			<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">General</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fas fa-minus"></i></button>
				</div>
			</div>
			<div class="card-body">
				<form action="{{action('ContentController@store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="file">Archivo</label>
						<input type="file" class="form-control" value=" " name="file" placeholder="">
					</div>
					<div class="form-group">
						<label for="author">Autor</label>
						<input type="text" class="form-control" value=" " name="author" placeholder="">
					</div>
					<div class="form-group">
						<label for="editorial">Editorial</label>
						<input type="text" class="form-control" value=" " name="editorial" placeholder="">
					</div>
					<div class="form-group">
						<label for="title">Titulo</label>
						<input type="text" class="form-control" value=" " name="title" placeholder="">
					</div>
					<div class="form-group">
						<label for="description">Descripción</label>
						<input type="text" class="form-control" value=" " name="description" placeholder="">
					</div>
					<div class="form-group">
						<label for="date_published">Fecha de Publicación</label>
						<input type="date" class="form-control" value=" " name="date_published" placeholder="">
					</div>
					<div class="form-group">
						<label for="image">Imagen</label>
						<input type="file" class="form-control" value=" " name="image" placeholder="">
					</div>

					<div class="form-group">
						<label for="matter">Materia</label>
						<input type="text" class="form-control" value=" " name="matter" placeholder="">
					</div>
					
					{{-- <div class="form-group">
						<label for="user_id">Usuario que crea el contenido</label>
						<select multiple class="form-control" name="user_id">
							<option value="1">1</option>
							<option value="2">2</option>
						</select>
					</div> --}}
				
			</div>
			<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		<div class="col-md-6">
			<div class="card card-secondary">
			<div class="card-header">
				<h3 class="card-title">Categoría</h3>

				<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fas fa-minus"></i></button>
				</div>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label for="category_id">Categoria</label>
					<select multiple class="form-control" name="category_id">
						@foreach ($categories as $category)
					<option value="{{ $category -> id }}">{{ $category -> title }}</option>
						@endforeach
						{{-- <option value="1">1</option>
						<option value="2">2</option> --}}
					</select>
				</div>
			</div>
			<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		</div>
		<div class="row">
			<div class="col-12">
				<a href="{{action('AdminController@contents')}}" name="button" class="btn btn-danger">
					Cancelar
				</a>

				<button type="submit" class="btn btn-success float-right">
					Guardar
				</button>
			</div>
			</form>
		</div>
	</section>
	<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

@endsection