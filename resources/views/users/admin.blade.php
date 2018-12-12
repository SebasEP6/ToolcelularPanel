@extends('layout')

@section('content')
<div class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="{{ route('panel') }}">Panel</a></li>
			<li class="active">Compa&ntilde;&iacute;as</li>
		</ol>
		<div class="col-md-8 col-md-offset-2">
			<div class="alert alert-info text-center">
				<h3>Administrar compa&ntilde;&iacute;as</h3>
				<a href="{{ route('addUs') }}" class="btn btn-info panel-btn">Agregar</a>
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<tr>
							<th>Logo</th>
							<th>Nombre</th>
							<th>Fecha de registro</th>
							<th>Acciones</th>
						</tr>
						@foreach($users as $user)
						<tr>
							<td>
								@if($user->path != null)
								<img src="{{ asset($user->path) }}" class="min-view">
								@else
								<img src="{{ asset('img/avatar.png') }}" class="min-view">
								@endif
							</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->date }}</td>
							<td>
								<a href="{{ route('renew', $user->id) }}" class="btn btn-info panel-btn">Renovar</a>
								<a href="{{ route('del', $user->id) }}" class="btn btn-danger panel-btn">Eliminar</a>
							</td>
						</tr>
						@endforeach
					</table>
					{!! $users->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@stop