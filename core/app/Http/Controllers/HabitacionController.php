<?php

namespace hotelya\Http\Controllers;

use Illuminate\Http\Request;
use hotelya\habitaciones;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('habitaciones.index');
    }
    public function listarhabitaciones()
    {
        $id = Auth::id();
            $habitaciones = DB::table('habitaciones')
            ->join('hoteles', 'habitaciones.hoteles_idhoteles', '=', 'hoteles.idhoteles')
            ->join('users', 'users.id', '=', 'hoteles.user_id')
            ->select('habitaciones.*')
            ->where('user_id',$id)
            ->get();
            return json_encode(["datos"=>$habitaciones,"type"=>"success","estado"=>1]);
    }

    public function editarHabitacion()
    {
        $datos= json_decode($_POST['data']);
        // dd($datos); 
        
        try{
            $cambioInformacion=habitaciones::find($datos->idhabitacion);  
            $cambioInformacion->numeroHabitacion=$datos->numero_habitacion;           
            $cambioInformacion->tipo=$datos->tipohabitacion;           
            $cambioInformacion->estado=$datos->estado;           
            $cambioInformacion->precio=$datos->precio;           
            $cambioInformacion->save(); 
            $mensaje = ["tipo"=>1,"mensaje"=>"la informaci&oacuten se ha cambió satisfatoriamente","evento"=>"success"]; 
        }catch(\Exception $e){
            $mensaje = ["tipo"=>2,"mensaje"=>"Algo salio mal contacte con al administrador del sistema.","evento"=>"error"]; 
        }
        echo json_encode($mensaje);
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
        $habitacion=habitaciones::find($id);
        return view('habitaciones.edit',compact("habitacion"));
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
        $habitacion=habitaciones::find($id);
        $habitacion->fill($request->all());
        $habitacion->save();
        return redirect('/habitaciones_administrar');
        
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
