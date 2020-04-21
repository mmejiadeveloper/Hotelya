@extends('layouts.layout')
@section('css')
    <link rel="stylesheet" href="theme/dist/css/hoteles/hoteles.css">
@endsection()
@section('contenido')



{!! Form::model($imagen,['route' => ['imagenes.update',$imagen->idimagen],'method'=>'PUT','files'=>true]) !!}

{!!Form::hidden('id_hotel',$imagen->id_hotel)!!}
{!!Form::label('nombre', 'imagen')!!}
{!!Form::file('nombre', ['class' => 'form-control'])!!}
<br>
{!!Form::submit('Actualizar Imagen',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}


@endsection()

@section('js')
    <script src="theme/dist/js/hoteles/hoteles.js"></script>
@endsection()