<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GuardarCliente;
use App\clientes;
use App\paises;
class clienteController extends Controller
{
    public function index()
    {
        $data['paises'] = paises::all();
        $data['clientes'] = clientes::all();
        return view('clientes.index')->with('data', $data);
    }    

    public function store(GuardarCliente $form)
    {
        clientes::create([
            'nit' => bcrypt($form->nit),
            'nombre' => $form->nombre,
            'direccion' => $form->direccion,
            'telefono' => $form->telefono,
            'paises_id' => $form->pais,
            'departamentos_id' => $form->departamento,
            'ciudades_id' => $form->ciudad,
            'cupo' => $form->cupo,
        ]);

        return redirect()->route('cliente.index');
    }

    
}
