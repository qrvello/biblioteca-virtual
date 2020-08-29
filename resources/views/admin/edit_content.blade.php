	@extends('layouts.admin')

	@section('content')

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Project Edit</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active">Project Edit</li>
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
				<form action="{{action('ContentController@update', $content->id)}}" method="POST"
									autocomplete="off" enctype="multipart/form-data">
									@method('PUT')
									@csrf
									<div class="form-group">
										<label for="file">Archivo</label>
										<input type="file" class="form-control" value="{{ $content->file }}" name="file">
									</div>
									<div class="form-group">
										<label for="author">Autor</label>
										<input type="text" class="form-control" value="{{ $content->author }}" name="author">
									</div>
									<div class="form-group">
										<label for="editorial">Editorial</label>
										<input type="text" class="form-control" value="{{ $content -> editorial }}" name="editorial">
									</div>
									<div class="form-group">
										<label for="title">Titulo</label>
										<input type="text" class="form-control" value="{{ $content -> title }}" name="title">
									</div>
									<div class="form-group">
										<label for="description">Descripción</label>
										<textarea type="text" class="form-control" value="" name="description">{{ $content -> description }}</textarea>
									</div>
									<div class="form-group">
										<label for="date_published">Fecha de Publicación</label>
										<input type="date" class="form-control" value="{{ $content -> date_published }}" name="date_published">
									</div>
									<div class="form-group">
										<label for="image">Imagen</label>
										<input type="file" class="form-control" value="{{ $content -> image }}" name="image">
									</div>

									<div class="form-group">
										<label for="matter">Materia</label>
										<input type="text" class="form-control" value="{{ $content -> matter }}" name="matter">
									</div>

									<button type="submit" class="btn btn-primary">
										Guardar
									</button>

									<a href="{{action('AdminController@contents')}}" name="button" class="btn btn-danger">
										Cancelar
									</a>
								</form>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
			</div>
			<div class="col-md-6">
			<div class="card card-secondary">
				<div class="card-header">
				<h3 class="card-title">Categoria</h3>

				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fas fa-minus"></i></button>
				</div>
				</div>
				<div class="form-group">
					<label for="category_id">Categoria</label>
					<select multiple class="form-control" name="category_id" >
						<option selected="selected" value="{{ $content->category->id }}">{{ $content -> category -> title }}</option>
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
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	@endsection
