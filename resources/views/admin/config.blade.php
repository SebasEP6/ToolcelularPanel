@extends('layout')

@section('content')
<div class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="{{ route('panel') }}">Panel</a></li>
			<li class="active">Configuraci&oacute;n</li>
		</ol>
		<div class="col-md-8 col-md-offset-2">
			<div class="alert alert-info alert-login text-center">
				<h3>Configuraci&oacute;n</h3>
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
				{!! Form::model($user, ['route' => 'config', 'method' => 'post', 'files' => 'true']) !!}
					<div class="form-group">
						{!! Form::label('name', 'Introduzca el nombre de la compa&ntilde;ia') !!}
						{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ej: Toolcelular']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('email', 'Introduzca el email de administraci&oacute;n') !!}
						{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ej: toolcelular@gmail.com']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('description', 'Introduzca la descrici&oacute;n o eslogan de su compa&ntilde;ia') !!}
						{!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'M&aacute;s que un servicio t&eacute;cnico']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('password', 'Introduzca su clave') !!}
						{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ej: 123456']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('logo', 'Suba su logo o una imagen que lo identifique') !!}
						{!! Form::file('logo') !!}
					</div>
					<div class="form-group">
						<button class="btn btn-info pull-right" type="submit">Guardar</button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@stop