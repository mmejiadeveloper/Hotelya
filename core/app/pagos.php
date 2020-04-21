<?php

namespace hotelya;

use Illuminate\Database\Eloquent\Model;

class pagos extends Model
{
    protected $table='pagos';
    protected $primaryKey='idpagos';
    protected $fillable = ['total','fechaSalida','created_at','updated_at'];
    public $timestamps = true;
}
