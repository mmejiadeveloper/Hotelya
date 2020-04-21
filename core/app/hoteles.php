<?php

namespace hotelya;

use Illuminate\Database\Eloquent\Model;

class hoteles extends Model
{
    protected $table='hoteles';
    protected $primaryKey='idhoteles';
    protected $fillable = ['nombre','direccion','numeroHabitaciones','ciudad','departamento','user_id','created_at','updated_at','telefono'];
    public $timestamps = true;
}
