@extends('layout')

@section('content')
<div class="container">
	<h3 class="sub">Selecciona la compa&ntilde;&iacute;a con la cual contrataste el servicio <a href="{{ route('login') }}"><small>Administrar</small></a></h3>
	@foreach($users as $user)
	<div class="col-md-4 card">
		<div class="alert alert-info">
			@if($user->path != null)
			<img src="{{ asset($user->path) }}" class="img img-responsive logo">
			@else
			<img src="{{ asset('img/avatar.png') }}" class="img img-responsive logo">
			@endif
			<h4><a href="#search-phone" class="u-name" data-toggle="collapse">{{ $user->name }}</a></h4>
			<div class="collapse" id="search-phone">
				<div class="well">
					{!! Form::open(['route' => ['sch', $user->id], 'method' => 'post']) !!}
						<div class="form-group">
							<div class="input-group">
								{!! Form::number('c_id', null, ['class' => 'form-control', 'placeholder' => 'Nro C&eacute;dula']) !!}
								<span class="input-group-btn">
									<button class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
								</span>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
			<p><i>{{ $user->description }}</i></p>
		</div>
	</div>
	@endforeach
</div>
@stop