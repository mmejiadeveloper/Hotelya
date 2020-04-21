<?php

namespace hotelya\Http\Controllers;

use Illuminate\Http\Request;
use hotelya\hoteles;
use hotelya\habitaciones;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class clienteController extends Controller
{


    public function __construct() {
        // $this->middleware('auth', ['only' => ['logout',"index"]]);
        $this->middleware('auth', ['except' => array('index','indexconfirmacion','confirmacionReserva','listar_hoteles')]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       return view('clientes.index');
    }

    public function indexconfirmacion()
    {
               
        return view('clientes.confirmacion');
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

    public function listar_hoteles()
    {
        // $id = Auth::id();
     
        try{    
            $datos= json_decode($_POST['data']);
            $ciudad = $datos->ciudad;
            $hoteles = DB::table('hoteles')
            ->join('servicios', 'hoteles.idhoteles', '=', 'servicios.id_hotel')                 
            ->select('hoteles.*','servicios.*')
            ->where('ciudad',$ciudad)
            ->get();

           
            //dd($hoteles->idhoteles);
            return json_encode(["datos"=>$hoteles,"type"=>"success","estado"=>1]);
            
        }catch(\Exception $e){
            // return json_encode(["datos"=>"Ocurrio un problema en la carga de la información si el problema persiste comiquese con al administrador del sistema","type"=>"error"]);
            return json_encode(["datos"=>$e->getMessage(),"type"=>"error","estado"=>0]);
        }

    }

    /**
     * metodo para saber si esta confirmada la reserva
     *
     * @return void
     */
    public function confirmacionReserva()
    {
        $id = Auth::id();
        try{    
            $datos= json_decode($_POST['data']);
            $documento = $datos->documento;
            $fecha = $datos->fechainicial;
            $confirmacion = DB::table('reservas')                      
            ->select('confirmacion')
            ->where([
                ['documento', '=', $documento],
                ['confirmacion', '=', 1],
                ['fechaIngreso', '=', $fecha],
            ])->get();
            return json_encode(["datos"=>$confirmacion,"type"=>"success","estado"=>1]);
            
        }catch(\Exception $e){
            // return json_encode(["datos"=>"Ocurrio un problema en la carga de la información si el problema persiste comiquese con al administrador del sistema","type"=>"error"]);
            return json_encode(["datos"=>$e->getMessage(),"type"=>"error","estado"=>0]);
        }

    }

    public function habitacionesdisponibles()
    {
        $id = Auth::id();
        try{    
            $datos= json_decode($_POST['data']);
           
            $idhotel = $datos->idhotel;
            $habitaciones = DB::table('habitaciones')
            ->select('habitaciones.*')
            ->where('hoteles_idhoteles',$idhotel)
            ->get();
            
            return json_encode(["datos"=>$habitaciones,"type"=>"success","estado"=>1]);
            
        }catch(\Exception $e){
            // return json_encode(["datos"=>"Ocurrio un problema en la carga de la información si el problema persiste comiquese con al administrador del sistema","type"=>"error"]);
            return json_encode(["datos"=>$e->getMessage(),"type"=>"error","estado"=>0]);
        }

    }

    public function falsoindex()
    {
        return view('clientes.falsoindex');
    }
  
}
