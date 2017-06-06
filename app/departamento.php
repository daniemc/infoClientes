<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    protected $table = 'departamento';

    public function ciudad()
    {
        return $this->hasMany('App\ciudad');
    }
}
