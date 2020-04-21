<?php

namespace hotelya;

use Illuminate\Database\Eloquent\Model;

class imagenes extends Model
{
    protected $table='imagenes';
    protected $primaryKey='idimagen';
    protected $fillable = ['nombre','id_hotel'];
    public $timestamps = false;
}
