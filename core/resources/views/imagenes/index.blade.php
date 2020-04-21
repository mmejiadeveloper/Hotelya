@extends('layouts.layout')
@section('css')
    <link rel="stylesheet" href="theme/dist/css/hoteles/hoteles.css">
@endsection()

@section('titulo_grande','administracion de im&aacutegenes') @show

@section('contenido')
<div id="app">


<input type="hidden" :v-model="id={{$hotel[0]->idhoteles}}">
<button  class="btn btn-primary" type="submit" @click="subirImagen(id)">Subir Imagen</button>

</div>

<br>
<div>
 
@if ($imagenes->isEmpty()==1)   
<h3>no se ha subido ninguna imagen</h3>
@else 

<table class="table table-bordered table-sm tabla-reservas">
    <thead >
    
          <th class="w-25" scope="col">Imagen</th>
          <th  scope="col">Acción</th>
         
    </thead>
    <tbody>
    
    </tbody>
    @foreach ($imagenes as $imagen)
    <tr>
    <td>
        <a id="single_image">
            <img src="/core/public/imagenes/{{ $imagen->nombre }}"  height="100" width="100">
        </a>
    
    </td>
    <td>
    
    {!!link_to_route('imagenes.edit', $title = 'Editar', $parameters = $imagen->idimagen, $attributes = ['class'=>'btn btn-warning'])!!}
    
      
    </td>
    
    </tr>
    @endforeach
    </table>
@endif

</div>

@endsection()

@section('js')
<script src="theme/dist/js/imagenes/imagenes.js"></script>
<script src="theme/dist/js/global.js"></script>

@endsection()