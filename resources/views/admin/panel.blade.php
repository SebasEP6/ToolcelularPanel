@extends('layout')

@section('content')
<div class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li class="active">Panel</li>
		</ol>
		<div class="col-md-8 col-md-offset-2">
			<div class="alert alert-info text-center">
				<h3>Panel de administraci&oacute;n</h3>
				<a href="{{ route('phones') }}" class="btn btn-info text-center panel-btn">Tel&eacute;fonos</a>
				<a href="{{ route('config') }}" class="btn btn-info text-center panel-btn">Configuraci&oacute;n</a>
				@if(Auth::user()->email == 'toolcelular@gmail.com')
				<a href="{{ route('comp') }}" class="btn btn-info text-center panel-btn">Empresas</a>
				@endif
				<a href="{{ route('logout') }}" class="btn btn-info text-center panel-btn">Salir</a>
			</div>
		</div>
	</div>
</div>
@stop