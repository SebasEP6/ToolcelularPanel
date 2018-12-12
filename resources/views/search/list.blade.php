@extends('layout')

@section('content')
<div class="container">
	<ol class="breadcrumb">
		<li><a href="{{ route('home') }}">Principal</a></li>
		<li class="active">Tel&eacute;fonos</li>
	</ol>
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tr>
							<th>Marca</th>
							<th>Modelo</th>
							<th>IMEI</th>
							<th>Ingreso</th>
							<th>Falla</th>
							<th>Presupuesto</th>
							<th>Entrega</th>
							<th>Estado</th>
							<th>Acci&oacute;n</th>
						</tr>
						@foreach($entries as $entry)
						<tr>
							<td>{{ $entry->phone->name }}</td>
							<td>{{ $entry->brand_model->name }}</td>
							<td>{{ $entry->secret }}</td>
							<td>{{ $entry->ingress }}</td>
							<td>
								@if ($entry->error == null)
								Sin revisar
								@else
								{{ $entry->error }}
								@endif
							</td>
							<td>
								@if ($entry->budget == null)
								Sin revisar
								@else
								{{ $entry->budget.' BsF' }}
								@endif
							</td>
							<td>{{ $entry->egress }}</td>
							<td>{{ trans('utils.entries.'.$entry->state) }}</td>
							<td>
								<a href="{{ route('phView', [$entry->phone->name, $entry->id]) }}" class="btn btn-info panel-btn">
									Ver detalles
								</a>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection