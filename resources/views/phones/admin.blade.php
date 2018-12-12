@extends('layout')

@section('content')
<div class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="{{ route('panel') }}">Panel</a></li>
			<li class="active">Tel&eacute;fonos</li>
		</ol>
		<div class="col-md-12">
			<div class="alert alert-info text-center">
				<h3>Administraci&oacute;n Tel&eacute;fonos</h3>
				<a href="{{ route('addPh') }}" class="btn btn-info panel-btn">Agregar</a>
				@if (count($entries) > 0)
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<tr>
							<th>C&eacute;dula</th>
							<th>Marca</th>
							<th>Modelo</th>
							<th>IMEI</th>
							<th>Falla</th>
							<th>Fecha de ingreso</th>
							<th>Presupuesto</th>
							<th>Estado</th>
							<th>Entrega</th>
							<th>Acciones</th>
						</tr>
						@foreach($entries as $entry)
						<tr>
							<td>{{ $entry->c_id }}</td>
							<td>{{ $entry->phone->name }}</td>
							<td>{{ $entry->brand_model->name }}</td>
							<td>{{ $entry->p_imei }}</td>
							<td>
								@if ($entry->error == null)
								Sin revisar
								@else
								{{ $entry->error }}
								@endif
							</td>
							<td>{{ $entry->ingress }}</td>
							<td>
								@if ($entry->error == null)
								Sin revisar
								@else
								{{ $entry->budget.' BsF' }}
								@endif
							</td>
							<td>{{ trans('utils.entries.'.$entry->state) }}</td>
							<td>{{ $entry->egress }}</td>
							<td>
								<a href="{{ route('upPh', $entry->id) }}" class="btn btn-info panel-btn">Editar</a>
								<a href="{{ route('delPh', $entry->id) }}" class="btn btn-danger panel-btn">Eliminar</a>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@stop