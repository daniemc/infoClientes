<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $table = 'cliente';
    protected $fillable = ['nit', 'nombre', 'direccion', 'telefono', 'pais', 'departamento', 'ciudad', 'cupo'];
}
