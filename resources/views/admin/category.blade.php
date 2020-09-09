@extends('layouts.admin')

@section('title', 'Categoria')

@section('content')
<!-- Content Wrapper. Contains page content -->

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
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
