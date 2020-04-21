@extends('layouts.layout')
@section('css')
    <link rel="stylesheet" href="theme/dist/css/hoteles/hoteles.css">
@endsection()

@section('titulo_grande','Reservas') @show

@section('contenido')
<div id="app">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 divestado_carga" >
        <span>@{{  mensaje_cargar  }}</span>
    </div>
    
    <table v-if="reservas.length>0 &&  ajax_estado == 0 " class="table table-bordered table-sm tabla-reservas">
        <thead >
            <th class="w-20" >Nombres</th>
            <th class="w-20" >Apellidos</th>
            <th class="w-20" >Fecha de ingreso</th>
            <th class="w-20" >Estado</th>
            <th class="w-20 text-center" >Acciones</th>
        </thead>
        <tr v-for="reserva in reservas" v-if="reserva.visible==0">
            <td  v-text="reserva.nombres"></td>
            <td v-text="reserva.apellidos"></td>
            <td v-text="reserva.fechaIngreso"></td>


            <td :class="[ reserva.confirmacion==1 ? 'confirmado' : 'sinconfirmar' ] + ' text-center'"  :title="[ reserva.confirmacion!=1 ? 'Sin confirmar' : 'Confirmado' ] " >
                <i :class="[ reserva.confirmacion==1 ? 'fas fa-check-circle' : 'fas fa-times-circle' ]" ></i>
            </td>

            <td class="text-center" v-if="reserva.confirmacion==1 "> <button  @click="registrar_pagoReserva(reserva.idreservas)" type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-usd"></span>Registrar pago </button> </td>           
            <td class="text-center" v-if="reserva.confirmacion==0"> <button @click.prevent="enviarDato(reserva.idreservas)" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span>Confirmar reserva</button> </td>           
        </tr>
    </table>

    <div v-if='reservas.length<=0 && ajax_estado == 0 ' class="col-xs-12 col-sm-12 col-md-12 col-lg-12 divestado_carga text-center" >
        <span>No se ha encontrado reservas.</span>
    </div>
    {{-- <div v-if='ajax_estado == 1' class="col-xs-12 col-sm-12 col-md-12 col-lg-12 divestado_carga text-center" >
        <span>Espere mientras se carga la informaci&oacute;n.</span>
    </div> --}}

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registrar pago reserva</h4>
                </div>
                <div class="modal-body">                   

                    <div class='row rowmargin text-center' >
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                            <label class="labelpagos_reservas"  for="">Pago total</label>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center" >
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center" >

                            <div class="input-group">
                                <span class="input-group-addon iconspanbillete"><i class="fas fa-money-bill-alt"></i></span>
                                <input type="number"  v-model="registroPagoreserva.pago" class="inputpagos_reservas form-control">
                            </div>

                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center" >
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button :disabled="registroPagoreserva.pago.length<=0" @click="asignar_pagoreserva()" type="button" class="btn btn-primary" >Enviar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


</div>



@endsection()

@section('js')
   {!!Html::script('theme/dist/js/global.js')!!}
   {!!Html::script('theme/dist/js/reservas/reservas.js')!!}
@endsection()