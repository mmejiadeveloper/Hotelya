@extends('layouts.layout')
@section('css')
    <link rel="stylesheet" href="theme/dist/css/hoteles/hoteles.css">
@endsection()

@section('titulo_grande','Crear hotel') @show

@section('contenido')  
 


<div id="ciudad" name="ciudad" class="formualario-crear-edita" >

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 formualario-crear-edita-header ">
        Registro de hoteles
    </div>
    
    <div >
        {!! Form::open(['route'=>'hotel_store']) !!}
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12" style="padding-top:15px;" >
        {!! Form::label('Nombre') !!}    
        {!! Form::text('nombre', null, [ 'v-model'=>'registroHotel.nombre' , 'class'=>'form-control' ,"placeholder"=>"Ej: Hotelera sas..." , "required"]) !!}
        </div>
    
    
        <div  style="padding-top:15px;" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12">
            {!! Form::label('Seleccione departamento') !!}           
            <select v-model="departamentoSelect" class="form-control" id="departamento" name="departamento" v-model="registro.dpto" required >
                <option value=""> Seleccione </option>
                <option   v-for="(d,index) in departamentos" v-text="d.departamento" :value="d.departamento"></option>
            </select>
        </div>
        <div style="padding-top:15px;" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"v-if="departamentoSelect=='Santander'" >
                 
                <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
                <select   v-model="municipioSelect" id="ciudad" name="ciudad" name="ciudad"  class="form-control" required>
                    <option v-for="(m,index) in municipiosSantander"  v-text="m.municipio"  :value="m.municipio" ></option>
                </select>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Amazonas'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect" id="ciudad" name="ciudad" name="ciudad"   class="form-control" required>
                <option v-for="m in municipiosAmazonas"  v-text="m.municipio"  :value="m.municipio" ></option>
            </select>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Antioquia'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect"  id="ciudad" name="ciudad"   class="form-control" required>
                <option v-for="m in municipiosAntioquia"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Arauca'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect"  id="ciudad" name="ciudad" name="ciudad"  class="form-control" required>
                <option v-for="m in municipiosArauca"  v-text="m.municipio"  :value="m.municipio" ></option>
            </select>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Atlántico'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect"  id="ciudad" name="ciudad"  name="ciudad" class="form-control" required>
                <option v-for="m in municipiosAtlántico"  v-text="m.municipio"  :value="m.municipio" ></option>
            </select>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Bolívar'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect" id="ciudad" name="ciudad"    class="form-control" required>
                <option v-for="m in municipiosBolivar"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
    
    
    
       
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Boyacá'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect" id="ciudad" name="ciudad" class="form-control" required>
                <option v-for="m in municipiosBoyacá"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
    
      
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Caldas'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect" id="ciudad" name="ciudad" class="form-control" required>
                <option v-for="m in municipiosCaldas"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
    
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Caquetá'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect"  id="ciudad" name="ciudad"   class="form-control" required>
                <option v-for="m in municipiosCaquetá"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
    
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Casanare'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect"  id="ciudad" name="ciudad"   class="form-control" required>
                <option v-for="m in municipiosCasanare"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
    
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Cauca'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect" id="ciudad" name="ciudad"   class="form-control" required>
                <option v-for="m in municipiosCauca"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Cesar'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect" id="ciudad" name="ciudad"    class="form-control" required>
                <option v-for="m in municipiosCesar"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
    
       
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12" style="padding-top:15px;"  v-if="departamentoSelect=='Chocó'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect" id="ciudad" name="ciudad"    class="form-control" required>
                <option v-for="m in municipiosChocó"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Córdoba'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect"  id="ciudad" name="ciudad"   class="form-control" required>
                <option v-for="m in municipiosCórdoba"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Cundinamarca'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect"  id="ciudad" name="ciudad"   class="form-control" required>
                <option v-for="m in municipiosCundinamarca"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
      
      
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Guainía'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect"  id="ciudad" name="ciudad"   class="form-control" required>
                <option v-for="m in municipiosGuainia"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Guaviare'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect" id="ciudad" name="ciudad"    class="form-control" required>
                <option v-for="m in municipiosGuaviare"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
       
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Huila'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect"  id="ciudad" name="ciudad"   class="form-control" required>
                <option v-for="m in municipiosHuila"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='La Guajira'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect"  id="ciudad" name="ciudad"   class="form-control" required>
                <option v-for="m in municipiosLaGuajira"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
      
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Magdalena'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect" id="ciudad" name="ciudad"    class="form-control" required>
                <option v-for="m in municipiosMagdalena"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
       
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Meta'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect"  id="ciudad" name="ciudad"   class="form-control" required>
                <option v-for="m in municipiosMeta"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Nariño'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect"  id="ciudad" name="ciudad"   class="form-control" required>
                <option v-for="m in municipiosNariño"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Norte de Santander'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect"  id="ciudad" name="ciudad"   class="form-control" required>
                <option v-for="m in municipiosNortedeSantander"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Putumayo'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect" id="ciudad" name="ciudad"    class="form-control" required>
                <option v-for="m in municipiosPutumayo"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
       
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Quindío'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect"  id="ciudad" name="ciudad"   class="form-control" required>
                <option v-for="m in municipiosQuindio"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
       
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Risaralda'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect"  id="ciudad" name="ciudad"   class="form-control" required>
                <option v-for="m in municipiosRisaralda"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
       
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12" style="padding-top:15px;"  v-if="departamentoSelect=='San Andrés y Providencia'" >
             
            <label for="municipioSelect"  >Seleccione municipio  San Andrés  </label>
            <select v-model="municipioSelect"   id="ciudad" name="ciudad"  class="form-control" required>
                <option v-for="m in municipiosSanAndrésyProvidencia"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
       
      
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Sucre'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect"   id="ciudad" name="ciudad"  class="form-control" required>
                <option v-for="m in municipiosSucre"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
        
        <div  class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Tolima'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect"   id="ciudad" name="ciudad"  class="form-control" required>
                <option v-for="m in municipiosTolima"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Valle del Cauca'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect"  id="ciudad" name="ciudad"   class="form-control" required>
                <option v-for="m in municipiosValle"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Vaupés'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect"  id="ciudad" name="ciudad"   class="form-control" required>
                <option v-for="m in municipiosVaupés"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12"style="padding-top:15px;"  v-if="departamentoSelect=='Vichada'" >
             
            <label for="municipioSelect"  >Seleccione municipio  @{{  departamentoSelect  }} </label>
            <select v-model="municipioSelect"  id="ciudad" name="ciudad"   class="form-control" required>
                <option v-for="m in municipiosVichada"  v-text="m.municipio"  :value="m.municipio"></option>
            </select>
        </div>     
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12" style="padding-top:15px;">
                {!! Form::label('Direccion:') !!}   
                {!! Form::text('direccion',null,[  'v-model'=>'registroHotel.direccion' , 'class'=>'form-control',"placeholder"=>"Ej: Calle 123 Nro 456...", "required"]) !!}
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12" style="padding-top:15px;" >
                {!! Form::label('N&uacute;mero de habitaci&oacute;nes:') !!}   
                
                {!! Form::number('numeroHabitaciones', null, [  'v-model'=>'registroHotel.numero' , 'class'=>'form-control',"placeholder"=>"Ej: 3", "required"]) !!}
                
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-12" style="padding-top:15px;">
                {!! Form::label('T&eacute;lefono:') !!}   
                {!! Form::text('telefono',null,[  'v-model'=>'registroHotel.telefono' , 'class'=>'form-control' ,"placeholder"=>"Ej: +57 31500000" , "required" ]) !!}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding-top:20px; text-align:left;" >
            {{-- {!! Form::submit('Registrar', ['class'=>'btn btn-primary','style'=>'background:#8a8a8a;border:1px solid #8a8a8a; ']) !!} --}}
            <input  value="Registrar" type="submit"  style="'background-color:#8a8a8a !important; border:1px solid #8a8a8a;" class="btn btn-primary" >
        </div>
    </div>
   
        
    {!! Form::close() !!}

</div>
@endsection()

@section('js')
    <script src="theme/dist/js/global.js"></script>
    <script src="theme/dist/js/ciudadesGlobal.js"></script>
@endsection()


