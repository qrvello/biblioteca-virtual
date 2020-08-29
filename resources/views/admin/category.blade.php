@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Listado de categorias</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Categorias</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
<div>
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
			<div class="card">
				<div class="card-header">
				<h3 class="card-title">Responsive Hover Table</h3>

				<div class="card-tools">
					<div class="input-group input-group-sm" style="width: 150px;">
					<input type="text" name="table_search" class="form-control float-right" placeholder="Search">

					<div class="input-group-append">
						<button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
					</div>
					</div>
				</div>
				</div>
				<!-- /.card-header -->
				<div class="card-body table-responsive p-0">
				<table class="table table-hover text-nowrap">
					<thead>
							<tr>
								<th>Titulo</th>
								<th>Descripción</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($categories as $category)
							<tr>
								<td>{{$category -> title}}</td>
								<td>{{$category -> description}}</td>
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
		<div class="row">
			<div class="col-12">
			<div class="card">
				<div class="card-header">
				<h3 class="card-title">Fixed Header Table</h3>
				<div class="card-tools">
					<div class="input-group input-group-sm" style="width: 150px;">
					<input type="text" name="table_search" class="form-control float-right" placeholder="Search">

					<div class="input-group-append">
						<button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
					</div>
					</div>
				</div>
				</div>
				<!-- /.card-header -->
				<div class="card-body table-responsive p-0" style="height: 300px;">
					<table class="table table-head-fixed text-nowrap">
						<thead>
							<tr>
								<th>Titulo</th>
								<th>Descripción</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($categories as $category)
							<tr>
								<td>{{$category -> title}}</td>
								<td>{{$category -> description}}</td>
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
