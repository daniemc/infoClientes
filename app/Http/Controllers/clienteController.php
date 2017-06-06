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
        
        return view('clientes.index')->with('data', $data);
    }    

    public function store(GuardarCliente $form)
    {
        clientes::create([
            'nit' => bcrypt($form->nit),
            'nombre' => $form->nombre,
            'direccion' => $form->direccion,
            'telefono' => $form->telefono,
            'pais' => $form->pais,
            'departamento' => $form->departamento,
            'ciudad' => $form->ciudad,
            'cupo' => $form->cupo,
        ]);

        return $this->index();
    }

    public function show()
    {
        $clientes = clientes::all();
        return view('clientes.show');   
    }
}
