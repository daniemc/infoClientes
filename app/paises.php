<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paises extends Model
{
    protected $table = 'paises';

    public function departamentos()
    {
        return $this->hasMany('App\departamentos');
    }

    public function ciudades()
    {
        return $this->hasManyThrough('App\departamentos', 'App\ciudades');
    }

    public function clientes()
    {
        return $this->hasMany('App\clientes');
    }
}
