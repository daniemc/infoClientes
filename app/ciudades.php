<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ciudades extends Model
{
    protected $table = 'ciudades';

    public function clientes()
    {
        return $this->hasMany('App\clientes');
    }
}
