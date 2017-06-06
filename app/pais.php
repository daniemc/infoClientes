<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pais extends Model
{
    protected $table = 'pais';

    public function departamentos()
    {
        return $this->hasMany('App\departamentos');
    }

    public function ciudades()
    {
        return $this->hasManyThrough('App\departamento', 'App\ciudad');
    }
}
