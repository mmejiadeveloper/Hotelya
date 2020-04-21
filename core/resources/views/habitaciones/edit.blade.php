@extends('layouts.layout')
@section('css')
	{{-- <link rel="stylesheet" href="theme/dist/css/hoteles/hoteles.css"> --}}
	{!!Html::style("theme/plugins/Ionicons/css/ionicons.min.css")!!}
	{!!Html::style("theme/dist/css/hoteles/hoteles.css")!!}
@endsection() 


@section('titulo_grande','Habitaci&oacutenes disponibles') @show

@section('contenido')
<div id="app" class="formualario-crear-edita">

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 formualario-crear-edita-header ">
		Editar habitaci&oacute;n
	</div>

	{!! Form::model($habitacion,['route'=>['habitacion.update',$habitacion->idhabitaciones],'method'=>'PUT']) !!}
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"  style="padding-top:15px;">
				{!! Form::label('numero Habitaci&oacuten:') !!}
				{!!Form::text('numeroHabitacion',null,['class'=>'form-control'])!!}
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"  style="padding-top:15px;">
				{!! Form::label('Precio:') !!}
				{!!Form::text('precio',null,['class'=>'form-control'])!!}
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"  style="padding-top:15px;">
				{!! Form::label('Estado:') !!}               
				{!!Form::select('estado', ['libre' => 'libre', 'ocupado' => 'ocupado'], 'libre',['class'=>'form-control']);!!}
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"  style="padding-top:15px;">
				{!! Form::label('Tipo:') !!}
				{!!Form::select('tipo', ['ventilador' => 'ventilador', 'aire' => 'aire'], 'ventilador',['class'=>'form-control']);!!}
		</div>

		<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding-top:15px;">
			{!! Form::submit('Actualizar Datos', ['class'=>'btn btn-primary']) !!}
		</div>
		
		
                
	{!! Form::close() !!}      
</div>
@endsection()

@section('js')
	{{-- <script src="theme/dist/js/hoteles/hoteles.js"></script> --}}
	{{-- {!!Html::script("theme/dist/js/hoteles/hoteles.js")!!} --}}
@endsection()
      
