@extends('layouts.layout')
@section('css')
    <link rel="stylesheet" href="theme/dist/css/hoteles/hoteles.css">
@endsection()

@section('titulo_grande','Mirar hoteles disponibles') @show

@section('contenido')
    


<div id="app-4"> 
        
                      
            
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <label >Seleccione Departamento</label>
                <select v-model="departamentoSelect" class="form-control" >
                    <option v-for="d in departamentos" v-text="d.departamento"></option>
                </select>
        </div>
        
        <div v-if="departamentoSelect=='Santander'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                
                <label for="municipioSelect"  >Seleccione Ciudad en:  <span v-text="departamentoSelect"></label>
                <select   @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                    <option  v-for="m in municipiosSantander"  v-text="m.municipio"></option>
                </select>
        </div>
        <div v-if="departamentoSelect=='Amazonas'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosAmazonas"  v-text="m.municipio"></option>
            </select>
        </div>
        <div v-if="departamentoSelect=='Antioquia'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosAntioquia"  v-text="m.municipio"></option>
            </select>
        </div>
        <div v-if="departamentoSelect=='Arauca'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosArauca"  v-text="m.municipio"></option>
            </select>
        </div>
        <div v-if="departamentoSelect=='Atlántico'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosAtlántico"  v-text="m.municipio"></option>
            </select>
        </div>
        <div v-if="departamentoSelect=='Bolívar'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosBolivar"  v-text="m.municipio"></option>
            </select>
        </div>


  
       
        <div v-if="departamentoSelect=='Boyacá'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosBoyacá"  v-text="m.municipio"></option>
            </select>
        </div>

      
        <div v-if="departamentoSelect=='Caldas'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosCaldas"  v-text="m.municipio"></option>
            </select>
        </div>

        
        <div v-if="departamentoSelect=='Caquetá'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosCaquetá"  v-text="m.municipio"></option>
            </select>
        </div>

        
        <div v-if="departamentoSelect=='Casanare'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosCasanare"  v-text="m.municipio"></option>
            </select>
        </div>

        
        <div v-if="departamentoSelect=='Cauca'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosCauca"  v-text="m.municipio"></option>
            </select>
        </div>
        
        <div v-if="departamentoSelect=='Cesar'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosCesar"  v-text="m.municipio"></option>
            </select>
        </div>

       
        <div v-if="departamentoSelect=='Chocó'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosChocó"  v-text="m.municipio"></option>
            </select>
        </div>
        
        <div v-if="departamentoSelect=='Córdoba'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosCórdoba"  v-text="m.municipio"></option>
            </select>
        </div>
        
        <div v-if="departamentoSelect=='Cundinamarca'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosCundinamarca"  v-text="m.municipio"></option>
            </select>
        </div>
      
      
        <div v-if="departamentoSelect=='Guainía'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosGuainia"  v-text="m.municipio"></option>
            </select>
        </div>
        
        <div v-if="departamentoSelect=='Guaviare'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosGuaviare"  v-text="m.municipio"></option>
            </select>
        </div>
       
        <div v-if="departamentoSelect=='Huila'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosHuila"  v-text="m.municipio"></option>
            </select>
        </div>
        
        <div v-if="departamentoSelect=='La Guajira'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosLaGuajira"  v-text="m.municipio"></option>
            </select>
        </div>
      
        <div v-if="departamentoSelect=='Magdalena'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosMagdalena"  v-text="m.municipio"></option>
            </select>
        </div>
       
        <div v-if="departamentoSelect=='Meta'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
           
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosMeta"  v-text="m.municipio"></option>
            </select>
        </div>
        
        <div v-if="departamentoSelect=='Nariño'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
           
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosNariño"  v-text="m.municipio"></option>
            </select>
        </div>
        
        <div v-if="departamentoSelect=='Norte de Santander'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
           
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosNortedeSantander"  v-text="m.municipio"></option>
            </select>
        </div>
        
        <div v-if="departamentoSelect=='Putumayo'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosPutumayo"  v-text="m.municipio"></option>
            </select>
        </div>
       
        <div v-if="departamentoSelect=='Quindío'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosQuindio"  v-text="m.municipio"></option>
            </select>
        </div>
       
        <div v-if="departamentoSelect=='Risaralda'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosRisaralda"  v-text="m.municipio"></option>
            </select>
        </div>
       
        <div v-if="departamentoSelect=='San Andrés y Providencia'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosSanAndrésyProvidencia"  v-text="m.municipio"></option>
            </select>
        </div>
       
      
        <div v-if="departamentoSelect=='Sucre'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
           
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosSucre"  v-text="m.municipio"></option>
            </select>
        </div>
        
        <div v-if="departamentoSelect=='Tolima'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
           
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosTolima"  v-text="m.municipio"></option>
            </select>
        </div>
        
        <div v-if="departamentoSelect=='Valle del Cauca'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosValle"  v-text="m.municipio"></option>
            </select>
        </div>
        
        <div v-if="departamentoSelect=='Vaupés'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosVaupés"  v-text="m.municipio"></option>
            </select>
        </div>
        
        <div v-if="departamentoSelect=='Vichada'" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            
            <label for="municipioSelect"  >Seleccione  Ciudad en: <span v-text="departamentoSelect"></label>
            <select @click="obtener_hoteles()" v-model="municipioSelect" id="municipioSelect"   class="form-control">
                <option v-for="m in municipiosVichada"  v-text="m.municipio"></option>
            </select>
        </div>

    </div>
<br>
<br>

    <br>    
        
        {{-- <p v-if="condicion==0"><button type="submit" @click="cambiarCondicion()">cambio1</button></p>
        <p v-if="condicion==1"><button type="submit" @click="cambiarCondicion2()">cambio2</button></p> --}}
        <div v-if="hoteles.length > 0">
                <h4>Buscar</h4>
    
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                
             <select v-model="opcionbusqueda"  class="form-control" id="seleccion" >
                <option value="nombre">Nombre</option>        
                <option value="camadoble1persona">Cama doble una persona</option>
                <option value="camadoble2persona">Cama doble dos personas</option>
                <option value="camarote" >Cama doble y camarote</option>
                <option value="parqueadero">Parqueadero</option>
                <option value="wifi">Wifi</option>
            </select>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <input type="text" v-model="search" placeholder="buscar ..." class="form-control"/>
            </div>
        </div>
        <br>
        <br>

       <table  class="table tabla-reservas"  v-if="hoteles.length>0">
            <thead class="thead-dark">
                    <tr>
                      <th scope="col">Nombre del hotel</th>
                      <th scope="col">Direccion</th>
                      <th scope="col">Telefono</th>
                      <th style="width:10%;" scope="col">cama doble una persona</th>
                      <th style="width:10%;" scope="col">Cama doble dos personas</th>
                      <th style="width:10%;" scope="col">Cama doble y camarote</th>
                      <th scope="col">Parqueadero</th>
                      <th scope="col">Wifi</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody v-for="(hotel,index) in filteredList " v-show="(pagina-1)*numero <= index && pagina*numero > index">
                        
                       
                       
                        <tr >
                                <td >@{{hotel.nombre | capitalize}}</td>
                                <td >@{{hotel.direccion | capitalize}}</td>
                                <td >@{{hotel.telefono}}</td>
                                <td >@{{hotel.camadoble1persona}}</td>
                                <td >@{{hotel.camadoble2persona}}</td>
                                <td >@{{hotel.camarote}}</td>
                                <td >@{{hotel.parqueadero | capitalize}}</td>
                                <td >@{{hotel.wifi | capitalize}}</td>
                                <td >
                                <button type="submit"   @click="registrar_reserva(hotel.idhoteles)"  class="btn btn-danger">Reservar</button>
                                <button type="submit"   @click="mostrar_imagenes(hotel.idhoteles)"  class="btn btn-info">Mostrar Im&aacutegenes</button>
                                
                                </td>

                                
     
                         </tr>
                           
                  </tbody>              
           
           
        </table>
        <div class="paginador" v-if="hoteles.length > 0">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 displaypaginador"  > 
                P&aacute;gina actual: @{{ pagina }}
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "  >
                <a :class=" [ pagina!=1 ? '' : 'paginador-disabled'] " href="#" @click.prevent="pagina=1"  ><i class="fas fa-backward  icustom2"></i></a>
                <a :class=" [ pagina!=1 ? '' : 'paginador-disabled'] " href="#" @click.prevent="pagina=pagina-1"  ><i class="fas fa-arrow-circle-left icustom2"></i></a>
                <a :class=" [ (pagina*numero)/(hoteles.length) < 1 ? '' : 'paginador-disabled'] " href="#" @click.prevent="pagina=pagina+1"  ><i class="fas fa-arrow-circle-right icustom2"></i></a>
                <a :class=" [ (pagina*numero)/(hoteles.length) < 1 ? '' : 'paginador-disabled']" href="#" @click.prevent="pagina=redondear_numero(hoteles.length/numero, 0 )"  ><i class="fas fa-forward icustom2"></i></a>
            </div>
        </div>

        <div v-else> <p>Por favor seleccione un Departamento</p>  </div>



    
        
    
       
        
       {{-- modal --}}

      <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
               <!-- Modal content -->
                 <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Realizar reserva</h4>
                    </div>
                    <div class="modal-body">
                         
                            <div class='row ' >
                                    
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"  >
                                        <label for="">Documento</label>
                                        <input type="number" v-model="registro.documento"  class="form-control">
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                                        <label for="">Nacionalidad</label>
                                        <input type="text" v-model="registro.nacionalidad"   class="form-control">
                                    </div>
                                    
        
                                </div>  
                            <div class='row ' >
                                    
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"  >
                                        <label for="">Nombres</label>
                                        <input type="text" v-model="registro.nombre"  class="form-control">
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                                        <label for="">Apellidos</label>
                                        <input type="text" v-model="registro.apellidos"   class="form-control">
                                    </div>
                                    
        
                                </div>
                        <div class='row ' >
    
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"  >
                                <label for="">Cantidad de personas</label>
                                <input type="number" min=1 max=4 v-model="registro.cantidadPersona" class="form-control">
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                                <label for="">Tipo habitacion</label>
                                <select v-model="registro.tipohabitacion" name="tipohabitacion" id="tipohabitacion" class="form-control">
                                    <option value="cama doble una persona">Cama doble una persona</option>
                                    <option value="cama doble dos personas">Cama doble dos personas</option>
                                    <option value="cama doble y camarote">Cama doble y camarote</option>
                                </select>
                                
                            </div>

                        </div>
                       
                        

                        <div class='row rowmargin' >
    
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"  >
                                <label for="">Fecha de ingreso </label>
                                <input type="date"  name="somedate1" id="fechaEntrada" v-model="registro.fechaIngreso" class="form-control" required min="" >
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                                <label for="">Fecha de salida </label>
                                <input type="date" name="somedate2"  id="fechaSalida" v-model="registro.fechaSalida" class="form-control" required >
                            </div>

                        </div>
                        <div class="modal-footer">
                                <button  :disabled="registro.nombre.length<=0 || registro.apellidos.length<=0  || registro.documento.length<=0 || registro.tipohabitacion.length<=0 ||   registro.cantidadPersona.length<=0 || registro.fechaIngreso.length<=0 ||  registro.fechaSalida.length<=0 || registro.nacionalidad.length<=0 "   @click="asignar_reserva()" type="button" class="btn btn-primary" >Enviar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                </div>

            </div>
   
        </div> 


    @endsection()

    @section('js')
    {!!Html::script('theme/dist/js/global.js')!!}
    {!!Html::script('theme/dist/js/clientes/clientes.js')!!}
    {!!Html::script('theme/dist/js/imagenes/vue-gallery-slideshow.min.js')!!}
    <script src="https://unpkg.com/vue-gallery-slideshow"></script>
    <script>
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("somedate1")[0].setAttribute('min', today);
    document.getElementsByName("somedate2")[0].setAttribute('min', today);
    // document.getElementById('#fechaEntrada').value = new Date().toDateInputValue()
  

    $(document).ready(function () {
        // $('#fechaEntrada').val(new Date().toDateInputValue());
        // $('#fechaSalida').val(new Date().toDateInputValue());
    });
   
    </script>
   
    
    @endsection()