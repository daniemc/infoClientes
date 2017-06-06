<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departamentos extends Model
{
    protected $table = 'departamentos';

    public function ciudad()
    {
        return $this->hasMany('App\ciudad');
    }
}
