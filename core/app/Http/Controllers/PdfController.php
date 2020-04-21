<?php

namespace hotelya\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use hotelya\pagosReservas;
use hotelya\pagosHuespedes;
use Carbon\Carbon;
use Alert;


class PdfController extends Controller
{

    public function __construct() {
        // $this->middleware('auth', ['only' => ['logout',"index"]]);
        $this->middleware('auth', ['except' => array('generarFacturaReserva')]);
    }


    public function index()
    {
        return view("pdf.listado-reportes");
    }

    public function crearPDF()
    {
        
        $datos = explode("|",$_GET["datos"]);
        $iduser = Auth::id();
        // print_r($datos); die;
        // $pagosHuespedes=pagosHuespedes::select();
        $fechainicial = $datos[0];
        $fechafinal = $datos[1];
        $tipo = $datos[2];
        $modo = $datos[3];
        $sub_datos = [];
        if ($modo=='ph') {

            $vistaurl="pdf.reporte_pagos_huespedes";

                $sub_datos = DB::table('pagoshuespedes')                   
                ->from('pagoshuespedes as t1')
                ->leftjoin('registro_huespedes as t2',function($join){
                    $join->on('t1.id_registro_huespedes', '=', 't2.id');
                })            
                ->whereBetween('t1.created_at', [$fechainicial,  $fechafinal])
                ->where('t2.user_id','=',$iduser)
                ->get();

                $sumatotal=$sub_datos->sum("total");
                       
            } 
            if($modo=='pr') {
                $vistaurl="pdf.reporte_pagos_reservas"; 

                $sub_datos = DB::table('pagosreservas')                   
                ->from('pagosreservas as t1')
                ->leftjoin('reservas as t2',function($join){
                    $join->on('t1.id_reserva', '=', 't2.idreservas');
                })
                ->leftjoin('hoteles as t3',function($join){
                    $join->on('t3.idhoteles', '=', 't2.idhoteles');
                })            
                ->whereBetween('t1.created_at', [$fechainicial,  $fechafinal])
                ->where('t3.user_id','=',$iduser)
                ->get();

                $sumatotal=$sub_datos->sum("pago");                   
        }
        if($modo=='pt'){
            $vistaurl="pdf.reporte_total_por_fecha";

            $sub_datos_huespedes = DB::table('pagoshuespedes')                   
                ->from('pagoshuespedes as t1')
                ->leftjoin('registro_huespedes as t2',function($join){
                    $join->on('t1.id_registro_huespedes', '=', 't2.id');
                })            
                ->whereBetween('t1.created_at', [$fechainicial,  $fechafinal])
                ->where('t2.user_id','=',$iduser)
                ->get();

                $sumatotalhuespedes=$sub_datos_huespedes->sum("total");

                $sub_datos_reserva = DB::table('pagosreservas')                   
                ->from('pagosreservas as t1')
                ->leftjoin('reservas as t2',function($join){
                    $join->on('t1.id_reserva', '=', 't2.idreservas');
                })
                ->leftjoin('hoteles as t3',function($join){
                    $join->on('t3.idhoteles', '=', 't2.idhoteles');
                })            
                ->whereBetween('t1.created_at', [$fechainicial,  $fechafinal])
                ->where('t3.user_id','=',$iduser)
                ->get();

                $sumatotalreservas=$sub_datos_reserva->sum("pago"); 

                

        }
        
      
         if($modo=='pt'){
            $view=\View::make($vistaurl,compact('sub_datos_huespedes','sumatotalhuespedes','sub_datos_reserva','sumatotalreservas'))->render();
         }
         else{
            $data = $sub_datos;
            $total=$sumatotal;
            $view=\View::make($vistaurl,compact('data','total'))->render();
         }
        
        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHtml($view);

        if($tipo==1){return $pdf->stream("reporte");}
        if($tipo==2){return $pdf->download("reporte.pdf");}

    }

    public function reporte_pagos_huespedes()
    {

        
        $datos = ["huespedes"=>$pagosHuespedes,"url"=>$vistaurl,"tipor"=>$datos->tipo];
         $mensaje = ["datos"=>$datos,"tipo"=>1,"mensaje"=>"Se ha registrado la habitaci&oacuten","evento"=>"success"];
         echo json_encode($mensaje);
        // dd($pagosHuespedes);
        // return $this->crearPDF($pagosHuespedes,$vistaurl,$datos->tipo);
    }


    public function reporte_pagos_reservas($tipo)
    {
        $vistaurl="pdf.reporte_pagos_reservas";
        $pagosReservas=pagosReservas::all();
        return $this->crearPDF($pagosReservas,$vistaurl,$tipo);
    }


    public function generarFactura($habitacion,$id)
    {
        //dd($id);
        $nombreusuario=Auth::user()->name;
        
     
        
       // SELECT  idpagos ,`numero_habitacion` FROM `pagoshuespedes`  WHERE `numero_habitacion` = 0 ORDER BY idpagos DESC LIMIT 1
         $vistaurl="pdf.generarFactura";
         $fechahoy=Carbon::now();
        $sub_datos = DB::table('pagoshuespedes')
        ->join('registro_huespedes', 'pagoshuespedes.id_registro_huespedes', '=', 'registro_huespedes.id')
        ->join('users', 'registro_huespedes.user_id', '=', 'users.id')        
        ->join('hoteles', 'users.id', '=', 'hoteles.user_id')
        ->join('habitaciones', 'hoteles.idhoteles', '=', 'habitaciones.hoteles_idhoteles')
        //->select("pagoshuespedes.*")
         ->where([
             ['pagoshuespedes.numero_habitacion','=',$habitacion],
           
         ])
         ->orderBy('idpagos','desc')->take(1)
        ->get();
        //  dd($sub_datos);
         $view=\View::make($vistaurl,compact('sub_datos','nombreusuario','fechahoy'))->render();
         $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHtml($view);        
         return $pdf->download('factura.pdf');

        //return json_encode(["datos"=>$sub_datos,"type"=>"success","estado"=>1]);
     

    }

    public function generarFacturaReserva($cedula)
    {
      
        $nombreusuario=  Auth::user() !=null ? Auth::user()->name : 'Recepcionista' ;
        $vistaurl="pdf.generarFacturaReserva";
         $fechahoy=Carbon::now();
        $sub_datos = DB::table('pagosreservas')
        ->join('reservas', 'pagosreservas.id_reserva', '=', 'reservas.idreservas')
         ->join('hoteles', 'reservas.idhoteles', '=', 'hoteles.idhoteles')      
        ->where([
            ['reservas.documento','=',$cedula],
           
         ])
         ->orderBy('idpagoreserva','desc')->take(1)
        ->get();
       
    //    dd($sub_datos);
        if(count($sub_datos)==0){
           
            //return redirect()->route('confirmarReserva');
            session()->flash('notif','los datos que ingresos son incorrectos..vuelva a  intentar');
            return redirect()->route('confirmarReserva');
        } 
        else {
            
            $view=\View::make($vistaurl,compact('sub_datos','nombreusuario','fechahoy'))->render();
            $pdf=\App::make('dompdf.wrapper');
            $pdf->loadHtml($view);        
            return $pdf->download('facturareserva.pdf');       
        }    
        
         
    }
   
    


}
