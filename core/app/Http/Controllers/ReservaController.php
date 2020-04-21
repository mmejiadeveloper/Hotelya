<?php

namespace hotelya\Http\Controllers;

use Illuminate\Http\Request;
use hotelya\reservas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class ReservaController extends Controller
{
    public function __construct() {
        // $this->middleware('auth', ['only' => ['logout',"index"]]);
        $this->middleware('auth', ['except' => array('eliminarReserva',"registrar_reserva")]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservas.index');
    }

    /**
     * registrar las habitaciones  por parte del usuario(recepcionista)
     *
     * @return void
     */
    public function registrar_reserva(){

        $datos= json_decode($_POST['data']); 
        // dd($datos);
        // exit();
         $mensaje = ["tipo"=>0,"mensaje"=>"No se pudo completar la operación","evento"=>"error"];  
         $datos= json_decode($_POST['data'],true);
        //dd($datos);
        $rules = [
            'nombre' => 'required|regex:/[a-z A-Z]/',        
            'apellidos' => 'required|regex:/[a-z A-Z]/',        
        ];
    
        $validator = Validator::make($datos, $rules);

       // dd($validator);
    //    try{
        //dd($validator->passes());
        if ($validator->passes()) {
          
                \hotelya\reservas::create([
                   'nombres'=>$datos['nombre'],
                   'apellidos'=>$datos['apellidos'],
                   'documento'=>$datos['documento'],
                   'cantidadPersonas'=>$datos['cantidadPersona'],
                   'tipohabitacion'=>$datos['tipohabitacion'],
                   'fechaIngreso'=>$datos['fechaIngreso'],
                   'fechaSalida'=>$datos['fechaSalida'],
                   'nacionalidad'=>$datos['nacionalidad'],
                   'confirmacion'=>0,
                   'visible'=>0,
                   'idhoteles'=>$datos['idhoteles'],
               ]);
               $mensaje = ["tipo"=>1,"mensaje"=>"Se ha registrado la reserva","evento"=>"success"];   
   
           
           
               
               
               
            }else {
                // $mensaje = ["tipo"=>2,"mensaje"=>"Algo salio mal contacte con al administrador del sistema.","evento"=>"error"];   
                $mensaje = ["tipo"=>2,"mensaje"=>$validator->errors()->all(),"evento"=>"error"];
            }
            echo json_encode($mensaje);
        
        // // return('se creo exitosamente');
    }
    /**
     * metodo para listar  reservas
     */
    public function listar_reservas()
    {    

         $id = Auth::id();
         try{    
            //$datos= json_decode($_POST['data']);  
             $reservas = DB::table('reservas')
             ->join('hoteles', 'hoteles.idhoteles', '=', 'reservas.idhoteles')
             ->join('users', 'users.id', '=', 'hoteles.user_id')             
            ->where('users.id',$id)->where('reservas.visible',"!=",1)
            ->select('reservas.*')
             ->get(); 
            // dd($reservas);
            // exit();                   
            return json_encode(["datos"=>$reservas,"type"=>"success","estado"=>1]);
            
            
        }catch(\Exception $e){
        // //     // return json_encode(["datos"=>"Ocurrio un problema en la carga de la información si el problema persiste comiquese con al administrador del sistema","type"=>"error"]);
            return json_encode(["datos"=>$e->getMessage(),"type"=>"error","estado"=>0]);
        }

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

    public function editar_reservas($id)
    {     
     
            $reserva=reservas::find($id);            
            $reserva->confirmacion=1;
            $reserva->save();
            
        return redirect('/reservas_administrar');
           
    }
    public function ed_reserva()
    {     
        try{
            $datos= json_decode($_POST['data']); 
            // print_r($datos);
            // die;
            $reserva=reservas::find($datos->id_reserva); 
            //dd($reserva);           
            $reserva->confirmacion=1;
            if($reserva->save()){
                $mensaje = ["tipo"=>1,"mensaje"=>"Se ha confirmado la reserva","evento"=>"success"];   
            }
            // return redirect('/reservas_administrar');

        }catch(\Exception $e){
            $mensaje = ["tipo"=>0,"mensaje"=>"No se pudo completar la operación","evento"=>"error"];
            $mensaje = ["tipo"=>2,"mensaje"=>"Algo salio mal contacte con al administrador del sistema.","evento"=>"error"];   
            // $mensaje = ["tipo"=>2,"mensaje"=>$e->getMessage()];   

        }         
        return json_encode($mensaje);
            
           
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
    
     * @return \Illuminate\Http\Response
     */
    public function eliminarReserva()
    {
        $datos= json_decode($_POST['data']); 
        
        $mensaje = ["estado"=>0,"mensaje"=>"No se pudo completar la operación intente nuevamente","evento"=>"error"];
        try {
            $d=$datos->documento;
            $f=$datos->fechainicial;
            $reservas=reservas::where('documento',$d)->where('fechaIngreso',$f)->delete();            
             //dd($reservas); 
             if ($reservas!=0) {
                 
                 $mensaje = ["estado"=>1,"mensaje"=>"Se ha confirmado la operación de eliminar la reserva","evento"=>"success"]; 
             }  else {
                $mensaje = ["estado"=>0,"mensaje"=>"No se pudo completar la operación intente nuevamente","evento"=>"error"];
             }       
                       
            
          
        } 
        catch (\Exception $e) {
            $mensaje = ["estado"=>0,"mensaje"=>"No se pudo completar la operación intente nuevamente","evento"=>"error"];
        }
        return json_encode($mensaje);
    }
}