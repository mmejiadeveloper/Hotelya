<?php

namespace hotelya\Http\Controllers;

use Illuminate\Http\Request;
use hotelya\pagosreservas;
use hotelya\reservas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function registrar_pagoreserva(){
        
        //exit();

        try{
            $datos= json_decode($_POST['data']);
       
            pagosreservas::create([
            'pago'=>$datos->pago,
            'id_reserva'=>$datos->idreserva,
             ]);

             $reservas=reservas::find($datos->idreserva);  
             $reservas->visible=1;             
             $reservas->save(); 


            


            $mensaje = ["tipo"=>1,"mensaje"=>"Se ha registrado la pago de la reserva","evento"=>"success"];

        }catch(\Exception $e){
            $mensaje = ["tipo"=>0,"mensaje"=>"No se pudo completar la operación","evento"=>"error"];
            $mensaje = ["tipo"=>2,"mensaje"=>"Algo salio mal contacte con al administrador del sistema.","evento"=>"error"];
            // $mensaje = ["tipo"=>2,"mensaje"=>$e->getMessage()];

        }
        echo json_encode($mensaje);
        // return('se creo exitosamente');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
