<?php

namespace hotelya;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Undocumented variable
     *
     * @var boolean
     */
    public $timestamps = false;
     
    /**
    * Undocumented variable
    *
    * @var string
    */
    protected $primaryKey = 'id';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','cargo', 'password', 'user_role', 'email_activation', 'user_state','create_hotel_state',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function hoteles()
    {
        return $this->hasMany(hoteles::class,'user_id');
    }
}
