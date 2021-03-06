<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'vendedor'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function visitas()
    {
        return $this->hasMany('App\visitas');
    }

    public function esVendedor()
    {
        if($this->vendedor == 1){
            return true;
        }
        return false;
    }

    public static function Vendedores()
    {
        return self::where('vendedor', 1)->get();
    }
}
