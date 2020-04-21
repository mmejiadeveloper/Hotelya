@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="theme/dist/css/hoteles/hoteles.css">
@endsection()


@section('titulo_grande','Listado de Reportes') @show

@section('contenido')
<h3>Reportes</h3>
<div id="app">
    <form >
        <div class='row rowmargin filtrosv2' >
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"  >
                <label  >Fecha inicial</label>
                <input type="date" id="fechaInicial" v-model="filtros.fechaInicial" class="form-control">
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                <label >Fecha final </label>
                <input type="date" id="fechaFinal" v-model="filtros.fechaFinal" class="form-control">
            </div>

        </div>
    </form>
    <br>

    <div>

        <table class="table tabla-reservas">
            <thead>
                <th colspan="3" >Reportes</th>
            </thead>
            <tbody>
                <tr>
                    <td style='width:50%; border: 1px solid transparent !important;' >Reporte pagos huéspedes</td>
                    <td style='border: 1px solid transparent !important;' >
                        <button @click="mostrar_reporte(1,'ph')" type="submit" class="btn btn-info boton-ver"> <i class="far fa-eye iconoboton"></i> &nbsp;{{-- PRIMER LETRA VA EN INICIAL MAYUSCULA!!!  --}} {{-- ver --}}  Ver </button> 
                        <button @click="mostrar_reporte(2,'ph')" type="submit" class="btn btn-warning boton-descargar"><i class="fas fa-file-download iconoboton"></i> &nbsp; Descargar </button> 
                    </td>
                </tr>
                <tr>
                    <td style='width:50%; border: 1px solid transparent !important;' >Reporte pagos reservas</td>
                    <td style='border: 1px solid transparent !important;'>
                        <button @click="mostrar_reporte(1,'pr')" type="submit" class="btn btn-info boton-ver"> <i class="far fa-eye iconoboton"></i> &nbsp;{{-- PRIMER LETRA VA EN INICIAL MAYUSCULA!!!  --}} {{-- ver --}}  Ver </button> 
                        <button @click="mostrar_reporte(2,'pr')" type="submit" class="btn btn-warning boton-descargar"> <i class="fas fa-file-download iconoboton"></i> &nbsp; Descargar </button> 
                    </td>
                </tr>
                <tr>
                    <td style='width:50%; border: 1px solid transparent !important;' >Reporte total por fecha</td>
                    <td style='border: 1px solid transparent !important;'  >
                        <button @click="mostrar_reporte(1,'pt')" type="submit" class="btn btn-info boton-ver"> <i class="far fa-eye iconoboton"></i> &nbsp;{{-- PRIMER LETRA VA EN INICIAL MAYUSCULA!!!  --}} {{-- ver --}}  Ver  </button> 
                        <button @click="mostrar_reporte(2,'pt')" type="submit" class="btn btn-warning boton-descargar"> <i class="fas fa-file-download iconoboton"></i> &nbsp; Descargar </button> 
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

</div>

@endsection()

@section('js')
{!!Html::script('theme/dist/js/reportes/reportes.js')!!}
@endsection()