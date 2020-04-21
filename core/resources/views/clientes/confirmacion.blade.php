@extends('layouts.layout')
@section('css')
    <link rel="stylesheet" href="theme/dist/css/hoteles/hoteles.css">
@endsection()

@section('titulo_grande','confirmar reserva') @show

@section('contenido')

<div id="appc">

    <div>
        @if(session()->has('notif'))
            <div class="row">
                <div class="alert alert-error">
                    <button type="button" class="close"
                        data-dismiss="alert" aria-hidden="true">EsteHotel
                    </button>
                    <strong>Mensaje :</strong>{{session()->get('notif')}}
                </div>
            </div>
        @endif
    </div>

    <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3  col-xl-3"  >
            <label  >Fecha que realizo la reserva</label>
            <input type="date" id="fechaInicial" class="form-control" v-model="registro.fechainicial">
    </div>
    <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3  col-xl-3" >
            <label for="documento" >N&uacute;mero de documento </label>
            <input type="text" id="documento" class="form-control" v-model="registro.documento">
    </div>
    <div class="col-xs-4 col-sm-4 col-md-6 col-lg-6  col-xl-6" style="padding-top: 25px;" >
        <button :disabled="registro.fechainicial.length <= 0 || registro.documento.length <= 0"  class="btn btn-primary" type="submit" @click="obtener_consulta()">Consultar</button> 
        <button :disabled="registro.fechainicial.length <= 0 || registro.documento.length <= 0" class="btn btn-success" type="submit" @click="generacionFactura(registro.documento)">Generar Factura</button> 
        <button :disabled="registro.fechainicial.length <= 0 || registro.documento.length <= 0" class="btn btn-danger" type="submit" @click="eliminarReserva()">Eliminar Reserva</button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  col-xl-12" style="padding-top: 21px;" >
            <div v-if="accion == 1">
                <h4 class="reservaconfirmada" v-if="confirmaciones.length > 0 ">Su reserva está confirmada</h4>
                <h4 class="reservapendiente" v-else>Su reserva está en trámite o no existe en nuestra base de datos</h4>
            </div>
    </div>
</div>



@include('sweet::alert')
@endsection()

@section('js')
{!!Html::script('theme/dist/js/global.js')!!}
{!!Html::script('theme/dist/js/clientes/confirmacion.js')!!}



@endsection()