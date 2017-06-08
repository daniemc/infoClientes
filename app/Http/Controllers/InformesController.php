<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Charts;
class InformesController extends Controller
{
    
    public function index()
    {
        $datos = DB::table('visitas')
            ->join('clientes', 'clientes.id', '=', 'visitas.clientes_id')
            ->join('ciudades', 'ciudades.id', '=', 'clientes.ciudades_id')
            ->groupBy('ciudades.id', 'ciudades.nombre')
            ->select(DB::raw('ciudades.id, ciudades.nombre, count(*) as visitas'))
            ->get();

        $chart = Charts::create('bar', 'material')
            ->title('Visitas por ciudad')
            ->template("material")
            ->elementLabel("Visitas")
            ->labels($datos->pluck('nombre'))
            ->values($datos->pluck('visitas'))
            ->responsive(true);

        return view('informes.general', ['chart' => $chart]);
    }
}
