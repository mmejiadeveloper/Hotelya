<?php

namespace hotelya;

use Illuminate\Database\Eloquent\Model;

class reservas extends Model
{
    protected $table='reservas';
    protected $primaryKey='idreservas';
    protected $fillable = ['documento','nombres','apellidos','nacionalidad','cantidadPersonas','tipohabitacion','fechaIngreso','fechaSalida','confirmacion','visible','idhoteles'];
    public $timestamps = false;
}
