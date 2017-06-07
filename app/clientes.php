<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['nit', 'nombre', 'direccion', 'telefono', 'paises_id', 'departamentos_id', 'ciudades_id', 'cupo', 'porcentaje'];

    public function paises()
    {
        return $this->belongsTo('App\paises');
    }

    public function departamentos()
    {
        return $this->belongsTo('App\departamentos');
    }

    public function ciudades()
    {
        return $this->belongsTo('App\ciudades');
    }

    public function visitas()
    {
        return $this->hasMany('App\visitas');
    }

}
