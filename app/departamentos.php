<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departamentos extends Model
{
    protected $table = 'departamentos';

    public function ciudades()
    {
        return $this->hasMany('App\ciudades');
    }

    public function clientes()
    {
        return $this->hasMany('App\clientes');
    }
}
