@extends('layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="alert alert-info alert-login text-center">
				<h3>Registro</h3>
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Hey!</strong> Se encontraron algunos problemas.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<form class="form-horizontal form" role="form" method="POST" action="{{ route('login') }}">
					<input type="hidden" name="_token" class="form-control" value="{{ csrf_token() }}">
					<div class="form-group">
						<label for="email" class="sr-only">Ingresa tu correo:</label>
						<input type="text" name="email" id="email" class="form-control" placeholder="Ingresa tu correo">
					</div>
					<div class="form-group">
						<label for="password" class="sr-only">Ingresa tu clave:</label>
						<input type="password" name="password" id="password" class="form-control" placeholder="Ingresa tu clave">
						<label for="remember-me" class="checkbox-inline">
							<input type="checkbox" name="remember" id="remember-me">
							Recu&eacute;rdame
						</label>
					</div>
					<button type="submit" class="btn btn-info pull-right">Ingresar</button>
				</form>
				<!-- <a href="#" class="btn btn-link">Olvide mi clave</a> -->
			</div>
		</div>
	</div>
</div>
@stop