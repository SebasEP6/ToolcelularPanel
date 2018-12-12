<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Toolcelular | Servicio Tecnico</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		@yield('styles')
		<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
	</head>
	<body>
		<div class="container-fluid header-container">
			<div class="container">
				<header>
					<div class="page-header">
						<img src="{{ asset('img/logo.png') }}" class="img img-responsive">
						<h1>Servicio de rastreo <!-- T&eacute;nico --> Toolcelular</h1>
					</div>
				</header>
			</div>
			<div class="division"></div>
		</div>

		@yield('content')

		<div class="navbar-fixed-bottom">
			<footer>
				<hr/>
				<div class="container">
					<p>Todos los derechos Reservados 2016. Desarrollado por <span class="author">Sebasti&aacute;n Escalona</span></p>
					<a href="http://toolcelular.com.ve"><p>< Volver a la p&aacute;gina pincipal</p></a>
				</div>
			</footer>
		</div>

		<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
 				crossorigin="anonymous"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		@yield('scripts')
	</body>
</html>