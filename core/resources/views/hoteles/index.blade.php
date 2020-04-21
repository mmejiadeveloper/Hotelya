@extends('layouts.layout')
@section('css')
    <link rel="stylesheet" href="theme/dist/css/hoteles/hoteles.css">
@endsection()

@section('titulo_grande','Habitaci&oacutenes disponibles') @show

@section('contenido')
    <div id="app" >
        <div v-if="habitaciones.length >0 ">

            <div v-for='(habitacion,index) in habitaciones' class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center div-habitacion-padre imagen-habitacion" >
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 imagen-habitacion " >
                    <span class="spanhabitacion" > Habitaci&oacute;n n&uacute;mero: </span> <br>
                    <span class="spannrohabita" > @{{habitacion.numeroHabitacion}} </span>
                </div>
    
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 imagen-habitacion" >
                    {{-- <img src="theme/dist/img/puerta.jpg" height="75" width="75" > --}}
                    <i class="fas fa-door-closed puertaicono"></i>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"  v-if="habitacion.estado=='libre'">
                    {{-- <img src="theme/dist/img/checklisto.jpg" height="20" width="20">   --}}
                    <i class="far fa-check-circle tomarhabitacion" @click="registrar_habitacion(habitacion)" ></i><br>
                    <small>De click sobre el icono para tomar la habitaci&oacute;n.</small>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div-iconoes-estado"  v-if="habitacion.estado=='ocupado'">
                    <i class="fas fa-ban ocupado" title='La habitaci&oacute;n est&aacute; ocupada  '></i>
                    <i class="fas fa-door-open liberar" title='Liberar habitaci&oacute;n' @click="cambiar_estado_libre(habitacion.idhabitaciones)" ></i>
                    <i class="fas fa-file-invoice factura " title='Imprimir factura' @click="generacionFactura(habitacion.numeroHabitacion,habitacion.idhabitaciones)" ></i> <br>
                    <small>De click sobre el la puerta azul para liberar la habitaci&oacute;n.</small>
                </div>
                    
                <div :class="[ habitacion.estado=='ocupado' ? 'habitacion-ocupada' : 'habitacion-libre' ] + ' text-center habitacion-recolor div-habitacion-fondo '"  >
                </div>
    
                {{-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" v-if="habitacion.estado=='ocupado'">
                    <a ">Cambiar estado a libre</a> 
                    <button type="submit" @click="generacionFactura(habitacion.numeroHabitacion,habitacion.idhabitaciones)">generar Factura</button>
                </div> --}}
            </div>
        </div>
        <div v-else>
            <br>
            <br>
            <h4 style="text-align:center ;font-weight:bold">No se ha creado un hotel comuníquese con su administrador. </h4>
        </div>

        

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h4 class="modal-title">Registrar cliente</h4>

                    </div>
                    <div class="modal-body">  
                        
                        <div class='row ' >
    
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"  >
                                <label for="">Nombre</label>
                                <input type="text" v-model="registro.nombre" class="form-control">
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                                <label for="">Apellido</label>
                                <input type="text"  v-model="registro.apellidos"  class="form-control">
                            </div>

                        </div>

                        <div class='row rowmargin' >
    
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"  >
                                <label for="">Documento</label>
                                <input type="number"  v-model="registro.documento"  class="form-control">
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                                <label for="">Cantidad de personas</label>
                                <input type="number"  min="1" max="4"   v-model="registro.cantidadPersona" class="form-control">
                            </div>

                        </div>

                        <div class='row rowmargin' >
    
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"  >
                                <label for="">Fecha de ingreso a la habitaci&oacute;n</label>
                                <input type="date" v-model="registro.fechaIngreso" class="form-control">
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                                <label for="">Fecha de salida de la habitaci&oacute;n</label>
                                <input type="date"  v-model="registro.fechaSalida" class="form-control">
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                                <label for="">Pago total</label>
                                <input type="number"  v-model="registro.total" class="form-control">
                            </div>

                        </div>
                        <div class='row rowmargin' >
    
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"  >
                                <label for="nombre">N&uacute;mero de habitaci&oacute;n</label><br>
                                <span>@{{registro.numero_habitacion}}</span>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                                <label for="nombre">Tipo de habitaci&oacute;n</label><br>
                                <span>@{{registro.tipohabitacion}}</span>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button  :disabled=" registro.documento.length<=0 || registro.tipohabitacion.length<=0 || registro.fechaIngreso.length<=0 ||  registro.fechaSalida.length<=0 || registro.apellidos.length<=0 || registro.cantidadPersona.length<=0 ||   registro.nombre.length<=0 || registro.total.length<=0 "   @click="asignar_habitacion()" type="button" class="btn btn-primary" >Enviar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>

        
    </div>


    
    

@endsection()

@section('js')
    <script src="theme/dist/js/hoteles/hoteles.js"></script>
@endsection()