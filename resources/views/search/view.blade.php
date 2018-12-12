@extends('layout')

@section('content')
<div class="container">
	<ol class="breadcrumb">
		<li><a href="{{ route('home') }}">Principal</a></li>
		<li>Tel&eacute;fonos</li>
		<li class="active">Detalles</li>
	</ol>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="alert alert-info">
				<div class="text-center info">
					<h3>Detalles del Equipo</h3>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h4>Nombre:</h4>
						<p class="ph-desc"><i>{{ $entry->c_name }}</i></p>
					</div>
					<div class="col-md-6">
						<h4>C&eacute;dula:</h4>
						<p class="ph-desc"><i>{{ $entry->c_id }}</i></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h4>Marca del equipo:</h4>
						<p class="ph-desc"><i>{{ $entry->phone->name }}</i></p>
					</div>
					<div class="col-md-6">
						<h4>Modelo del equipo:</h4>
						<p class="ph-desc"><i>{{ $entry->brand_model->name }}</i></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h4>IMEI:</h4>
						<p class="ph-desc"><i>{{ $entry->secret }}</i></p>
					</div>
					<div class="col-md-6">
						<h4>Falla:</h4>
						<p class="ph-desc"><i>{{ $entry->error }}</i></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h4>Observaci&oacute;n:</h4>
						<p class="ph-desc"><i>{{ $entry->observation }}</i></p>
					</div>
					<div class="col-md-6">
						<h4>Entrega:</h4>
						<p class="ph-desc"><i>{{ $entry->egress }}</i></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h4>Estado:</h4>
						<p class="ph-desc"><i>{{ trans('utils.entries.'.$entry->state) }}</i></p>
					</div>
					<div class="col-md-6">
						<h4>Presupuesto:</h4>
						<p class="ph-desc"><i>{{ $entry->budget.' BsF' }}</i></p>
					</div>
				</div>
				<div class="row img-gallery">
					@foreach($entry->images as $image)
					<div class="col-md-4 img-ph">
						<a href="{{ asset($image->path) }}" target="blank">
							<img class="img-responsive" src="{{ asset($image->path) }}">
						</a>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection