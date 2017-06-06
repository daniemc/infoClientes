<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GuardarCliente;
use App\clientes;
class clienteController extends Controller
{
    public function index()
    {
        $data['paises'] = [];
        $data['departamentos'] = [];
        $data['ciudades'] = [];
        return view('clientes.index')->with('data', $data);
    }    

    public function store(GuardarCliente $form)
    {
        clientes::create($form);
    }

    public function show()
    {
        $clientes = clientes::all();

        return view('clientes.show');   
    }
}
