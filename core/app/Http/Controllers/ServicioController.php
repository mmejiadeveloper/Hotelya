<?php

namespace hotelya\Http\Controllers;

use Illuminate\Http\Request;
use hotelya\servicios;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('servicios.index');
    }

    public function listar_servicios()
    {

        try{
            $id = Auth::id();
            $servicios= DB::table('servicios')
            ->join('hoteles', 'hoteles.idhoteles', '=', 'servicios.id_hotel')
            ->join('users', 'users.id', '=', 'hoteles.user_id')
            ->where('users.id',$id)
            ->select('servicios.*')               
            ->get();
            return json_encode(["datos"=>$servicios,"type"=>"success","estado"=>1]);
        }catch(\Exception $e){
            // return json_encode(["datos"=>"Ocurrio un problema en la carga de la información si el problema persiste comiquese con al administrador del sistema","type"=>"error"]);
            return json_encode(["datos"=>$e->getMessage(),"type"=>"error","estado"=>0]);
        }

    }

    public function registrar_servicios(){
        $datos= json_decode($_POST['data']); 
        //para imprimir si estan llegando los datos
        // dd($datos);
        // exit();
         
        
       
        try{
            $id=$datos->idservicio;
         
            $servicio=servicios::find($id);  
            $servicio->wifi=$datos->wifi;
            $servicio->parqueadero=$datos->parqueadero;
            $servicio->camadoble1persona=$datos->camadoble1persona;
            $servicio->camadoble2persona=$datos->camadoble2persona;
            $servicio->camarote=$datos->camarote;
            $servicio->id_hotel=$datos->idhotel;
            $servicio->save(); 

            $mensaje = ["tipo"=>1,"mensaje"=>"Se ha registrado la actualizacion de los servicios","evento"=>"success"];   

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
