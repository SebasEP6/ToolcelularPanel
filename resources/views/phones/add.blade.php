@extends('layout')

@section('styles')
<!-- Datepicker Files -->
<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker3.css')}}">
<link rel="stylesheet" href="{{asset('css/bootstrap-standalone.css')}}">
@endsection

@section('content')
<div class="modal fade" id="new-phone">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h3 class="modal-title">Agregar marca</h3>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'newPhoneBrand', 'method' => 'post']) !!}
	                <div class="form-group">
	                	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombre de la marca']) !!}
	                </div>
	                <div class="form-group">
	                	<button class="btn btn-info pull-right">Guardar</button>
	                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="new-b-model">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h3 class="modal-title">Agregar modelo</h3>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'newBrandModel', 'method' => 'post']) !!}
	                <div class="form-group">
	                	{!! Form::label('phone_id', 'Seleccione la marca') !!}
	                	{!! Form::select('phone_id', $phones, null, ['class' => 'form-control']) !!}
	                </div>
	                <div class="form-group">
	                	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombre del modelo']) !!}
	                </div>
	                <div class="form-group">
	                	<button class="btn btn-info pull-right">Guardar</button>
	                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<div class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="{{ route('panel') }}">Panel</a></li>
			<li><a href="{{ route('phones') }}">Tel&eacute;fonos</a></li>
			<li class="active">Nueva</li>
		</ol>
		<div class="col-md-12">
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
				<div class="row">
				{!! Form::open(['route' => 'addPh', 'method' => 'post']) !!}
					<div class="form-group col-md-6">
						{!! Form::label('c_name', 'Introduzca el nombre del cliente') !!}
						{!! Form::text('c_name', null, ['class' => 'form-control', 'placeholder' => 'Ej: Pedro P&eacute;rez']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('c_id', 'Introduzca el n&uacute;mero de c&eacute;dula del cliente') !!}
						{!! Form::number('c_id', null, ['class' => 'form-control', 'placeholder' => 'Ej: 7545688']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('email', 'Introduzca el email del cliente') !!}
						{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ej: prueba@hotmail.com']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('phone_id', 'Seleccione la marca del t&eacute;lefono') !!}
						{!! Form::select('phone_id', $phones, null, ['class' => 'form-control', 'id' => 'brand', 'placeholder' => 'Marcas']) !!}
						<a href="#new-phone" type="button" class="btn btn-link" data-toggle="modal">Agregar marca</a>
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('brand_model_id', 'Seleccione el modelo del t&eacute;lefono') !!}
						{!! Form::select('brand_model_id', ['' => 'Modelos'], null, ['class' => 'form-control', 'id' => 'b-models']) !!}
						<a href="#new-b-model" type="button" class="btn btn-link" data-toggle="modal">Agregar modelo</a>
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('p_imei', 'Introduzca el imei del equipo') !!}
						{!! Form::text('p_imei', null, ['class' => 'form-control']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('delivery', 'Introduzca la fecha de entrega') !!}
						{!! Form::text('delivery', null, ['class' => 'form-control', 'id' => 'delDate']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('observation', 'Introduzca una observaci&oacute;n') !!}
						{!! Form::textarea('observation', null, ['class' => 'form-control', 'placeholder' => 'Ej: El equipo posee detalles en la carcasa']) !!}
					</div>
					<div class="form-group col-md-6">
						<button class="btn btn-info pull-right" type="submit">Guardar</button>
					</div>
				{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/moment.js') }}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<script language="javascript">
$(document).ready(function(){
   $("#brand").change(function (event) {
   		$.get("/modelos/" + event.target.value + "", function(response, brand){
   			$("#b-models").empty();
   			for (i = 0; i < response.length; i++) {
   				$("#b-models").append("<option value='" + response[i].id + "'>" + response[i].name + "</option>");
   			}
		})
	})
});
</script>
<script type="text/javascript">
$('#delDate').datepicker({
	format: "yyyy-mm-dd",
	weekStart: 0,
	startDate: "now",
	maxViewMode: 1,
	language: "es",
	multidate: false,
	daysOfWeekDisabled: "0,6"
});
</script>
@endsection