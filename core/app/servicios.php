<?php

namespace hotelya;

use Illuminate\Database\Eloquent\Model;

class servicios extends Model
{
    protected $table='servicios';
    protected $primaryKey='id';
    protected $fillable = ['wifi','parqueadero','camadoble1persona','camadoble2persona','camarote','id_hotel'];
    public $timestamps = false;
}
