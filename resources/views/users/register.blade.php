@extends('layout')

@section('title', 'Registrarse')

@section('header')

<div class="container">
	<div class="masthead-heading text-uppercase">Registrarse</div>
</div>

@endsection

@section('content')

<br>
<body>
	<link href="{{ asset('css/styles_form.css') }}" rel="stylesheet" />
	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
				<div class="card card-signin my-5">
					<div class="card-body">
						<h5 class="card-title text-center">Registrarse</h5>
						<form class="form-signin">
                            <div class="form-label-group">
								<input type="email" id="inputEmail" class="form-control" placeholder="marcos@example.com" autofocus>
								<label for="inputEmail">Correo electrónico</label>
                            </div>

							<div class="form-label-group">
								<input type="email" id="nombre" class="form-control" placeholder="Marcos" autofocus>
								<label for="nombre">Nombre</label>
                            </div>

                            <div class="form-label-group">
								<input type="email" id="apellido" class="form-control" placeholder="Pérez" autofocus>
								<label for="apellido">Apellido</label>
                            </div>


							<div class="form-label-group">
								<input type="password" id="password" class="form-control" placeholder="Contraseña">
								<label for="inputPassword">Contraseña</label>
                            </div>

                            	<div class="form-label-group">
								<input type="password" id="password2" class="form-control" placeholder="Repetir contraseña">
								<label for="password2">Repetir contraseña</label>
							</div>

							<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Registrarse</button>
							<hr class="my-4">
							<button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Registrarse con Google</button>
							<button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Registrarse con Facebook</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://kit.fontawesome.com/1324fa4c3b.js" crossorigin="anonymous"></script>
</body>

@endsection
