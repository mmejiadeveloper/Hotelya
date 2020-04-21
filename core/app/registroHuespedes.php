<?php

namespace hotelya;

use Illuminate\Database\Eloquent\Model;

class registroHuespedes extends Model
{
    protected $table='registro_huespedes';    
    protected $fillable = [
        'documento',
        'cantidadPersonas',
        'tipohabitacion',
        'fechaIngreso',
        'nombres',
        'apellidos',
        'numero_habitacion',
        'fechaSalida',
        'user_id'
    ];
    public $timestamps = false;
}
