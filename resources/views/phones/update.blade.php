@extends('layout')

@section('styles')
<!-- Datepicker Files -->
<link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker3.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap-standalone.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/dropzone.css') }}">
@endsection

@section('content')
<div class="modal fade" id="add-imgs">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h3 class="modal-title">Agregar im&aacute;genes</h3>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=> ['img', $entry->id], 'method' => 'post', 'files' => true, 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
                    <div class="dz-message" style="height:200px;">
                        Arrastra aqu&iacute; las im&aacute;genes
                    </div>
                    <div class="dropzone-previews"></div>
                	<button type="submit" class="btn btn-success" id="submit">Subir archivos</button>
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
			<li class="active">Actualizar</li>
		</ol>
		<div class="col-md-12">
			<div class="alert alert-info alert-login text-center">
				<h3>Actualizar</h3>
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
				{!! Form::model($entry, ['route' => ['upPh', $entry->id], 'method' => 'post']) !!}
					<fieldset disabled>
						<div class="form-group col-md-6">
						{!! Form::label('c_name', 'Nombre del cliente') !!}
						{!! Form::text('c_name', null, ['class' => 'form-control', 'placeholder' => 'Ej: Pedro P&eacute;rez']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('c_id', 'C&eacute;dula del cliente') !!}
						{!! Form::number('c_id', null, ['class' => 'form-control', 'placeholder' => 'Ej: 7545688']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('email', 'Introduzca el email del cliente') !!}
						{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ej: prueba@hotmail.com']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('phone_id', 'Marca del t&eacute;lefono') !!}
						{!! Form::text('phone_id', $entry->phone->name, ['class' => 'form-control', 'placeholder' => 'Ej: Samsung']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('brand_model_id', 'Modelo del t&eacute;lefono') !!}
						{!! Form::text('brand_model_id', $entry->brand_model->name, ['class' => 'form-control', 'placeholder' => 'Ej: i9300']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('p_imei', 'IMEI del equipo') !!}
						{!! Form::text('p_imei', null, ['class' => 'form-control']) !!}
					</div>
					</fieldset>
					<div class="row">
						<div class="form-group col-md-6">
							{!! Form::label('observation', 'Observaci&oacute;n') !!}
							{!! Form::textarea('observation', null, ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="row img-gallery">
					<div class="row">
					@foreach($entry->images as $img)
					<div class="col-md-4 img-ph">
						<img class="img-responsive" src="{{ asset($img->path) }}"></img>
					</div>
					@endforeach()
					</div>
					<div class="row">
					<a href="#add-imgs" type="button" class="btn btn-link" data-toggle="modal">Agregar im&aacute;genes</a>
					</div>
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('error', 'Introduzca el fallo del equipo') !!}
						{!! Form::text('error', null, ['class' => 'form-control']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('budget', 'Introduzca el presupuesto') !!}
						{!! Form::number('budget', null, ['class' => 'form-control', 'step' => '0.01']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('delivery', 'Introduzca la fecha de entrega') !!}
						{!! Form::text('delivery', null, ['class' => 'form-control', 'id' => 'delDate']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('state', 'Seleccione el estado') !!}
						{!! Form::select('state', ['non-check' => 'Sin revisar',
												'fixing' => 'Reparando',
												'fixed' => 'Reparado',
												'not-fixed' => 'No reparado',
												'delivered' => 'Entregado'], null, ['class' => 'form-control']) !!}
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
<script type="text/javascript" src="{{ asset('js/dropzone.js') }}"></script>
<script>
        Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 10,
            maxFiles: 4,

            init: function() {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;

                submitBtn.addEventListener("click", function(e){
                	e.preventDefault();
                	e.stopPropagation();
                    myDropzone.processQueue();
                });
                this.on("addedfile", function(file) {
                    console.log(file);
                });

                this.on("complete", function(file) {
                    myDropzone.removeFile(file);
                });
            }
        };
    </script>
@endsection