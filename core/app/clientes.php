<?php

namespace hotelya;

use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    protected $table='clientes';
    protected $primaryKey='idclientes';
    protected $fillable = ['documento','nombres','apellidos','telefono','nacionalidad','created_at','updated_at'];
    public $timestamps = true;
}
