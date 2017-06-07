<?php

namespace App\Http\Controllers;

use App\visitas;
use Illuminate\Http\Request;
use App\Http\Requests\GuardarVisita;

class VisitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('visitas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarVisita $form)
    {
        visitas::create([
            'fecha' => $form->fecha,
            'user_id' => $form->user_id,
            'clientes_id' => $form->cliente,
            'valor_neto' => $form->valor_neto,
            'valor_visita' => $form->valor_visita,
            'observaciones' => $form->observaciones,
        ]);

        return $this->redirectToIndex(true);
    }

    protected function redirectToIndex($ok = null)
    {
        return redirect()->route('visita.index', ['ok' => $ok]);
    }
}
