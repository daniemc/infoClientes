<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['nit', 'nombre', 'direccion', 'telefono', 'pais', 'departamento', 'ciudad', 'cupo'];
}
