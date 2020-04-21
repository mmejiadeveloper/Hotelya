<?php

namespace hotelya\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use hotelya\pagosReservas;
use hotelya\pagosHuespedes;
use Carbon\Carbon;
use Alert;


class GraficaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anio = date("Y");
       
        $mes = date("m");
        
        return view('graficas.index')->with("anio", $anio)
            ->with("mes", $mes);
    }
    /**
     * metodo para llevar la informacion de las graficas de los registros de los huespedes
     */
    public function index2()
    {
        $anio = date("Y");
        $mes = date("m");
        return view('graficas.index2')->with("anio", $anio)
            ->with("mes", $mes);
    }

    /**
     * metodo para saber el ultimo dia del mes 
     */
    public function getUltimoDiaMes($elAnio, $elMes)
    {
        return date("d", (mktime(0, 0, 0, $elMes + 1, 1, $elAnio) - 1));
    }

    /**
     * metodo para las graficas  de reservas
     */

    public function registros_mes($anio, $mes)
    {
        $iduser = Auth::id();
        $primer_dia = 1;
        $ultimo_dia = $this->getUltimoDiaMes($anio, $mes);
        $fecha_inicial = date("Y-m-d H:i:s", strtotime($anio . "-" . $mes . "-" . $primer_dia));
        $fecha_final = date("Y-m-d 23:59:59", strtotime($anio . "-" . $mes . "-" . $ultimo_dia));
        $pagoreservas = DB::table('pagosreservas')
            ->join('reservas', 'reservas.idreservas', '=', 'pagosreservas.id_reserva')
            ->join('hoteles', 'hoteles.idhoteles', '=', 'reservas.idhoteles')
            ->join('users', 'users.id', '=', 'hoteles.user_id')
            ->whereBetween('pagosreservas.created_at', [$fecha_inicial, $fecha_final])
            ->select('pagosreservas.*')
            ->where('users.id', '=', $iduser)
            ->get();
           //$pagoreservas=pagosReservas::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();

           
        $ct = count($pagoreservas);

        for ($d = 1; $d <= $ultimo_dia; $d++) {
            $registros[$d] = 0;
        }

        foreach ($pagoreservas as $pagoreserva) {
            $diasel = intval(date("d", strtotime($pagoreserva->created_at)));
            $registros[$diasel]++;
        }

        $data = array("totaldias" => $ultimo_dia, "registrosdia" => $registros);


        return json_encode($data);
    }


    /**
     * metodo para traer la suma  de los pagos por dia  de las  reservas de determinado mes
     */
    public function registros_mes_suma_pago_reservas($anio, $mes)
    {
        $iduser = Auth::id();
        $primer_dia = 1;
        $ultimo_dia = $this->getUltimoDiaMes($anio, $mes);
        $fecha_inicial = date("Y-m-d H:i:s", strtotime($anio . "-" . $mes . "-" . $primer_dia));
        $fecha_final = date("Y-m-d 23:59:59", strtotime($anio . "-" . $mes . "-" . $ultimo_dia));
        $pagoreservas = DB::table('pagosreservas')
            ->join('reservas', 'reservas.idreservas', '=', 'pagosreservas.id_reserva')
            ->join('hoteles', 'hoteles.idhoteles', '=', 'reservas.idhoteles')
            ->join('users', 'users.id', '=', 'hoteles.user_id')
            ->whereBetween('pagosreservas.created_at', [$fecha_inicial, $fecha_final])
            ->select('pagosreservas.*')
            ->where('users.id', '=', $iduser)
            ->get();

           //$pagoreservas=pagosReservas::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();

        $ct = count($pagoreservas);

        for ($d = 1; $d <= $ultimo_dia; $d++) {
            $registros[$d] = 0;

        }

        foreach ($pagoreservas as $pagoreserva) {
            //echo '<pre>';   
          //var_dump($pagoreserva->created_at);   
            $diasel = intval(date("d", strtotime($pagoreserva->created_at)));

            $registros[$diasel] = $registros[$diasel] + $pagoreserva->pago;


        }

        $data = array("totaldias" => $ultimo_dia, "registrosdia" => $registros);

   

        return json_encode($data);
    }


    /**
     * metodos para las graficas de pagoshuespedes
     */
    public function registros_mes_huespedes($anio, $mes)
    {
        $iduser = Auth::id();
        $primer_dia = 1;
        $ultimo_dia = $this->getUltimoDiaMes($anio, $mes);
        $fecha_inicial = date("Y-m-d H:i:s", strtotime($anio . "-" . $mes . "-" . $primer_dia));
        $fecha_final = date("Y-m-d 23:59:59", strtotime($anio . "-" . $mes . "-" . $ultimo_dia));

        $pagohuespedes = DB::table('pagoshuespedes')
            ->join('registro_huespedes', 'registro_huespedes.id', '=', 'pagoshuespedes.id_registro_huespedes')
            ->join('users', 'users.id', '=', 'registro_huespedes.user_id')
            ->whereBetween('pagoshuespedes.created_at', [$fecha_inicial, $fecha_final])
            ->select('pagoshuespedes.*')
            ->where('users.id', '=', $iduser)
            ->get();

          // $pagohuespedes=pagosHuespedes::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();
          // dd($pagohuespedes);
           //exit();
        $ct = count($pagohuespedes);

        for ($d = 1; $d <= $ultimo_dia; $d++) {
            $registros[$d] = 0;
        }

        foreach ($pagohuespedes as $pagohuespede) {
            $diasel = intval(date("d", strtotime($pagohuespede->created_at)));
            $registros[$diasel]++;
        }

        $data = array("totaldias" => $ultimo_dia, "registrosdia" => $registros);


        return json_encode($data);
    }

    /**
     * suma total por dia  de el pago de los huespedes que llegan sin hacer reservas
     */
    public function registros_mes_suma_pago_huespedes($anio, $mes)
    {
        $iduser = Auth::id();
        $primer_dia = 1;
        $ultimo_dia = $this->getUltimoDiaMes($anio, $mes);
        $fecha_inicial = date("Y-m-d H:i:s", strtotime($anio . "-" . $mes . "-" . $primer_dia));
        $fecha_final = date("Y-m-d 23:59:59", strtotime($anio . "-" . $mes . "-" . $ultimo_dia));
        $pagohuespedes = DB::table('pagoshuespedes')
            ->join('registro_huespedes', 'registro_huespedes.id', '=', 'pagoshuespedes.id_registro_huespedes')
            ->join('users', 'users.id', '=', 'registro_huespedes.user_id')
            ->whereBetween('pagoshuespedes.created_at', [$fecha_inicial, $fecha_final])
            ->select('pagoshuespedes.*')
            ->where('users.id', '=', $iduser)
            ->get();
           //$pagohuespedes=pagosHuespedes::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();

        $ct = count($pagohuespedes);

        for ($d = 1; $d <= $ultimo_dia; $d++) {
            $registros[$d] = 0;
        }

        foreach ($pagohuespedes as $pagohuespede) {
            $diasel = intval(date("d", strtotime($pagohuespede->created_at)));
            $registros[$diasel] = $registros[$diasel] + $pagohuespede->total;
        }

        $data = array("totaldias" => $ultimo_dia, "registrosdia" => $registros);
        return json_encode($data);
    }


    /**
     * metodo para obtener el total de cada mes
     *
     * @return void
     */
    public function obtener_pagos()
    {
        $dt = Carbon::now();
        $iduser = Auth::id();
        $pagos_meses = [];

        $primer_dia = 1;
        $ultimo_dia = 31;
        

        for ($i = 1; $i < 13; $i++) {
            $fecha_inicial = date("Y-m-d H:i:s", strtotime($dt->year . "-" . $i . "-" . $primer_dia));
            $fecha_final = date("Y-m-d 23:59:59", strtotime($dt->year . "-" . $i . "-" . $ultimo_dia));
            $pagos_meses[] = DB::table('pagosreservas')->select(DB::Raw("IFNULL(SUM(pago),0) as pago"))
                ->join('reservas', 'reservas.idreservas', '=', 'pagosreservas.id_reserva')
                ->join('hoteles', 'hoteles.idhoteles', '=', 'reservas.idhoteles')
                ->join('users', 'users.id', '=', 'hoteles.user_id')
                ->whereBetween('pagosreservas.created_at', [$fecha_inicial, $fecha_final])
                ->where('users.id', '=', $iduser)
                ->first();

        }
        // dd($pagos_meses);
        return $pagos_meses;
    }


}
