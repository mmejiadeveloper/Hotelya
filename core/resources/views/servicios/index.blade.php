@extends('layouts.layout')
@section('css')
    <link rel="stylesheet" href="theme/dist/css/hoteles/hoteles.css">
@endsection()

@section('titulo_grande','servicios del hotel') @show

@section('contenido')
<div id="app">
<table class="table table-bordered table-sm tabla-reservas">
    <thead >
    <th>Servicios</th>
    <th>Informaci&oacuten</th>
    </thead>
    <tbody v-for="servicio in servicios">
        <tr >
            <td >Wifi</td>
            <td v-text="servicio.wifi"></td>
        </tr>
        <tr>
            <td >Parqueadero</td>
            <td v-text="servicio.parqueadero"></td>
        </tr>     
  <tr>
      <td>Valor cama doble para una sola persona</td>
       <td v-text="servicio.camadoble1persona"></td>
    </tr>
<tr>
    <td>Valor cama doble para dos personas</td>
    <td v-text="servicio.camadoble2persona"></td>
</tr> 
<tr>
    <td>Valor cama doble y camarote</td>
    <td v-text="servicio.camarote"></td>
</tr>          
            
            
         <tr>
             <td><button  @click="registrar_servicio(servicio.id,servicio.id_hotel)" type="submit" class="btn btn-primary">Editar</button></td>
         <tr>   
         
        
    </tbody>
</table>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Actualizar servicios</h4>
            </div>
            <div class="modal-body">  
                
                <div class='row ' >

                   
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                        <label for="wifi">wifi</label>
                        <select v-model="registro.wifi" name="" id="wifi" class="form-control">
                            <option value="si">si</option>
                            <option value="no">no</option>
                         
                        </select>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                        <label for="parqueadero">parqueadero</label>
                        <select v-model="registro.parqueadero" name="" id="parqueadero" class="form-control">
                            <option value="si">si</option>
                            <option value="no">no</option>                         
                        </select>
                    </div>

                </div>
                <div class='row ' >

                   
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                        <label for="camadoble1persona">Cama doble para una persona</label>
                        <input v-model="registro.camadoble1persona" type="number" min="0" id="camadoble1persona" class="form-control">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                        <label for="camadoble2persona">Cama doble para 2 persona</label>
                        <input v-model="registro.camadoble2persona" type="number" min="0" id="camadoble2persona" class="form-control">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                        <label for="camarote">Cama doble y camarote</label>
                        <input v-model="registro.camarote" type="number" min="0" id="camarote" class="form-control">
                    </div>

                </div>

              
                
 {{-- modal --}}
            </div>
            <div class="modal-footer">
                <button    @click="asignar_servicio()" type="button" class="btn btn-primary" >Enviar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
    
</div>
@endsection()

@section('js')
{!!Html::script('theme/dist/js/global.js')!!}
{!!Html::script('theme/dist/js/servicios/servicios.js')!!}

@endsection()