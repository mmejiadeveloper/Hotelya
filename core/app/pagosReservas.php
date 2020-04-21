<?php

namespace hotelya;

use Illuminate\Database\Eloquent\Model;

class pagosReservas extends Model
{
    protected $table='pagosreservas';
    protected $primaryKey='idpagoreserva';
    protected $fillable = ['pago','id_reserva','created_at','updated_at'];
    public $timestamps = true;
}
