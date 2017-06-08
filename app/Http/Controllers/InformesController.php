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

        $visitas_por_ciudad = Charts::create('bar', 'material')
            ->title('Visitas por ciudad')
            ->template("material")
            ->elementLabel("Visitas")
            ->labels($datos->pluck('nombre'))
            ->values($datos->pluck('visitas'));

        return view('informes.general', ['visitas_por_ciudad' => $visitas_por_ciudad]);
    }

    public function informeCliente($id)
    {
        $datos = DB::table('visitas')
            ->join('clientes', 'clientes.id', '=', 'visitas.clientes_id')
            ->where('clientes.id', $id)
            ->select(DB::raw('visitas.fecha, clientes.cupo, clientes.cupo - (select sum(v.valor_visita) 
                             from visitas v where v.clientes_id = clientes.id and v.id <= visitas.id) as cupo_a_fecha'))
            ->get();

        $chart = Charts::create('line', 'material')
            ->title('Historia')
            ->template("material")
            ->elementLabel("Cupo en fecha")
            ->labels($datos->pluck('fecha')->prepend('Inicial'))
            ->values($datos->pluck('cupo_a_fecha')->prepend($datos[0]->cupo))
            ->responsive(false);

        return view('clientes.visitas', [
            'datos' => $datos,
            'chart' => $chart
        ]);
    }
}
