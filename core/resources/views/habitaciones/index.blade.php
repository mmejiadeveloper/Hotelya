@extends('layouts.layout')
@section('css')
    <link rel="stylesheet" href="theme/dist/css/hoteles/hoteles.css">
@endsection()

@section('titulo_grande','habitaciones') @show

@section('contenido')  
<div id="app">
    <h3>Habitaciones</h3>
    <div v-if="habitaciones.length > 0">
   
        <table  class="table table-bordered table-sm tabla-reservas">
            <thead>
                <th style="width:22%" scope="col">N&uacute;mero de habitaci&oacute;n</th>
                <th style="width:22%" scope="col">Estado</th>
                <th style="width:22%" scope="col">Tipo</th>
                <th style="width:22%" scope="col">Precio</th>
                <th style="width:12%" class="w-20 text-center" scope="col">Acciones</th>
            </thead>
            <tbody>
                    <tr v-for="(habitacion,index) in habitaciones" v-show="(pagina-1)*numero <= index && pagina*numero > index">
                            <td >@{{habitacion.numeroHabitacion}}</td>
                            <td>@{{ habitacion.estado }}</td>
                            <td>@{{ habitacion.tipo }}</td>
                            <td>@{{ habitacion.precio }}</td>
                            <td><button type="submit"  class="btn btn-success" @click="editar_habitacion(habitacion)">editar</button></td>
                        </tr>
               
            </tbody>
            
       
        </table>
    
        <div class="paginador" v-if="habitaciones.length > 0">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 displaypaginador"  > 
                    P&aacute;gina actual: @{{ pagina }}
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "  >
                    <a :class=" [ pagina!=1 ? '' : 'paginador-disabled'] " href="#" @click.prevent="pagina=1"  ><i class="fas fa-backward  icustom2"></i></a>
                    <a :class=" [ pagina!=1 ? '' : 'paginador-disabled'] " href="#" @click.prevent="pagina=pagina-1"  ><i class="fas fa-arrow-circle-left icustom2"></i></a>
                    <a :class=" [ (pagina*numero)/(habitaciones.length) < 1 ? '' : 'paginador-disabled'] " href="#" @click.prevent="pagina=pagina+1"  ><i class="fas fa-arrow-circle-right icustom2"></i></a>
                    <a :class=" [ (pagina*numero)/(habitaciones.length) < 1 ? '' : 'paginador-disabled']" href="#" @click.prevent="pagina=redondear_numero(habitaciones.length/numero, 0 )"  ><i class="fas fa-forward icustom2"></i></a>
                </div>
            </div>
    </div>
    <div v-else> <h4>no se han creado habitaci&oacutenes</h4></div>


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h4 class="modal-title">Editar  habitaci&oacuten</h4>

                    </div>
                    <div class="modal-body">  
                        
                        <div class='row ' >
    
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"  >
                                <label for="">Numero de habitaci&oacuten</label>
                                <input type="number" v-model="registro.numero_habitacion" class="form-control">
                            </div>
                             <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                                <label for="">Tipo habitaci&oacuten</label>
                                <select v-model="registro.tipohabitacion"  class="form-control" >
                                <option value="ventilador">Ventilador</option>
                                <option value="aire">Aire</option>                                
                                </select>
                               
                            

                        </div>

                        <div class='row margin-row' style="padding:15px">
    
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"  >
                                <label for="estado">Estado</label>
                                <select v-model="registro.estado" name="estado"  class="form-control" >
                                <option value="ocupado">Ocupado</option>
                                <option value="libre">libre</option>                                
                                </select>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                                <label for="precio">Precio</label>
                                <input type="number" name="precio"  id="precio"  v-model="registro.precio" class="form-control">
                            </div>

                        </div>

                    

                       
                    </div>
                    <div class="modal-footer">
                       <button     @click="enviar_editar_habitacion()" type="button" class="btn btn-primary" >Enviar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                     </div>
                </div>

            </div>
        </div>



    </div>
    @endsection()

@section('js')
    <script src="theme/dist/js/habitaciones/habitaciones.js"></script>
     <script src="theme/dist/js/global.js"></script>
     
     <script src="theme/dist/js/ciudadesGlobal.js"></script>
@endsection()