<?php

namespace hotelya;

use Illuminate\Database\Eloquent\Model;

class habitaciones extends Model
{
    protected $table='habitaciones';
    protected $primaryKey='idhabitaciones';
    protected $fillable = ['numeroHabitacion','tipo','estado','precio','created_at','updated_at','hoteles_idhoteles'];
    public $timestamps = true;
}
