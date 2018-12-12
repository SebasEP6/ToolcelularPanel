@extends('layout')

@section('content')
<div class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="{{ route('panel') }}">Panel</a></li>
			<li><a href="{{ route('comp') }}">Compa&ntilde;&iacute;as</a></li>
			<li class="active">Nueva</li>
		</ol>
		<div class="col-md-8 col-md-offset-2">
			<div class="alert alert-info alert-login text-center">
				<h3>Agregar</h3>
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
				{!! Form::open(['route' => 'addUs', 'method' => 'post']) !!}
					<div class="form-group">
						{!! Form::label('name', 'Introduzca el nombre de la compa&ntilde;&iacute;a', ['class' => 'sr-only']) !!}
						{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombre de la compa&ntilde;&iacute;a']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('email', 'Introduzca el correo de la compa&ntilde;&iacute;a', ['class' => 'sr-only']) !!}
						{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el correo de la compa&ntilde;&iacute;a']) !!}
					</div>
					<div class="form-group">
						<button class="btn btn-info pull-right">Guardar</button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@stop