<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitas extends Model
{
    protected $table = 'visitas';
    protected $fillable = ['user_id', 'clientes_id', 'valor_neto', 'valor_visita', 'observaciones'];

    public function clientes()
    {
        $this->belongsTo('App\clientes');
    }

    public function User()
    {
        $this->belongsTo('App\User');
    }
}
