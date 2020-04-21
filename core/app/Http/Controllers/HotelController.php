<?php

namespace hotelya\Http\Controllers;

use Illuminate\Http\Request;
use hotelya\hoteles;
use hotelya\habitaciones;
use hotelya\registroHuespedes;
use hotelya\pagoshuespedes;
use hotelya\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hoteles.index');
    }

    /**
     * metodo utilizado  para listar  las habitaciones  con un usuario dado por el sistema
     *
     * @return void
     */
    public function listar_habitaciones()
    {
        try{
            $id = Auth::id();
            $habitaciones = DB::table('habitaciones')
            ->join('hoteles', 'habitaciones.hoteles_idhoteles', '=', 'hoteles.idhoteles')
            ->join('users', 'users.id', '=', 'hoteles.user_id')
            ->select('habitaciones.*')
            ->where('user_id',$id)
            ->get();
            return json_encode(["datos"=>$habitaciones,"type"=>"success","estado"=>1]);
        }catch(\Exception $e){
            // return json_encode(["datos"=>"Ocurrio un problema en la carga de la información si el problema persiste comiquese con al administrador del sistema","type"=>"error"]);
            return json_encode(["datos"=>$e->getMessage(),"type"=>"error","estado"=>0]);
        }

    }
    /**
     * registrar las habitaciones  por parte del usuario(recepcionista)
     *
     * @return void
     */
    public function registrar_habitacion(){
        
       
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
            

                $iduser = Auth::id();
                \hotelya\registroHuespedes::create([
                    'nombres'=>$datos['nombre'],
                    'apellidos'=>$datos['apellidos'],
                    'documento'=>$datos['documento'],
                    'cantidadPersonas'=>$datos['cantidadPersona'],
                    'tipohabitacion'=>$datos['tipohabitacion'],
                    'fechaIngreso'=>$datos['fechaIngreso'],
                    'fechaSalida'=>$datos['fechaSalida'],
                    'numero_habitacion'=>$datos['numero_habitacion'],
                    'user_id'=>$iduser,
                ]);
                /**
                 * esta parte espara  insertar en la tabla pagoshuespedes
                 */
                $registro=registroHuespedes::all();
                $ultimo=$registro->last();           
                $id_registro_huesped=$ultimo["id"];
     
                \hotelya\pagoshuespedes::create([
                    'total'=>$datos['total'],
                    'id_registro_huespedes'=>$id_registro_huesped,
                    'numero_habitacion'=>$datos['numero_habitacion'],               
                ]);
                
                $cambio_estado=habitaciones::find($datos['idhabitacion']);  
                $cambio_estado->estado='ocupado';           
                $cambio_estado->save();         
     
     
     
     
                $mensaje = ["tipo"=>1,"mensaje"=>"Se ha registrado la habitación","evento"=>"success"];   
     
            } else {
                //TODO Handle your error
                //dd($validator->errors()->all());
                $mensaje = ["tipo"=>2,"mensaje"=>$validator->errors()->all(),"evento"=>"error"];   
    
            }
                
           
        

       // dd($datos);
       
        //exit();

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
        return view('hoteles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo '<pre>';
        // var_dump($request['departamento']);
        // dd($request->all());
        // exit();
        $id = Auth::id();      
       
        
        \hotelya\hoteles::create([
            'nombre'=>$request['nombre'],
            'direccion'=>$request['direccion'],
            'numeroHabitaciones'=>$request['numeroHabitaciones'],
            'ciudad'=>$request['ciudad'],
            'departamento'=>$request['departamento'],
            'telefono'=>$request['telefono'],
            'user_id'=>$id
        ]);
        $hoteles=hoteles::all();
        $ultimo=$hoteles->last();
        $cantidad=$ultimo["numeroHabitaciones"];
        $id=$ultimo["idhoteles"];

        \hotelya\servicios::create([
            'wifi'=>'no',
            'parqueadero'=>'no',
            'camadoble1persona'=>0,
            'camadoble2persona'=>0,
            'camarote'=>0,
            'id_hotel'=>$id
        ]);        


        for ($i = 1; $i <= $cantidad; $i++) {
            habitaciones::create([                
                'numeroHabitacion'=>'0',
                'estado'=>'libre',
                'tipo'=>'ventilador',
                'precio'=>'0', 
                'hoteles_idhoteles'=>$id           
            ]);
            
        }   

        $idUser = Auth::id();

        $cambioHotelCrear=\hotelya\User::find($idUser); 
        $cambioHotelCrear->create_hotel_state=1;          
        $cambioHotelCrear->save(); 


        return redirect('/hotel_create')->with('message','store');
    }

    /**
     * metodo para cambiar el estado a libre
     */
    public function cambiarestado()
    { 
       

        $datos= json_decode($_POST['data']); 
        
        try{
            $cambio_estado=habitaciones::find($datos->idhabitacion);  
            $cambio_estado->estado='libre';           
            $cambio_estado->save(); 
            $mensaje = ["tipo"=>1,"mensaje"=>"El estado se cambió satisfatoriamente","evento"=>"success"]; 
        }catch(\Exception $e){
            $mensaje = ["tipo"=>2,"mensaje"=>"Algo salio mal contacte con al administrador del sistema.","evento"=>"error"]; 
        }
        echo json_encode($mensaje);
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

    public function saludoInicial()
    {
        return view('hoteles.saludoInicial');
    }
}
