@extends('layouts.layout')
@section('css')
    <link rel="stylesheet" href="theme/dist/css/hoteles/hoteles.css">
@endsection()
@section('contenido')



{!! Form::open(['route' => 'imagenes.store','method'=>'POST','files'=>true]) !!}

{!!Form::hidden('id_hotel',$idhotel)!!}
{!!Form::label('nombre', 'imagen')!!}
{!!Form::file('nombre', ['class' => 'form-control'])!!}
<br>
{!!Form::submit('Subir Imagen',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}


@endsection()

@section('js')
    <script src="theme/dist/js/hoteles/hoteles.js"></script>
@endsection()