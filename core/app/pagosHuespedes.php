<?php

namespace hotelya;

use Illuminate\Database\Eloquent\Model;

class pagosHuespedes extends Model
{
    protected $table='pagoshuespedes';
    protected $primaryKey='idpagos';
    protected $fillable = ['total','numero_habitacion','id_registro_huespedes','created_at','updated_at'];
    public $timestamps = true;
}
