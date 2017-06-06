<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GuardarCliente;
class clienteController extends Controller
{
    public function index()
    {
        $data['paises'] = [];
        $data['departamentos'] = [];
        $data['ciudades'] = [];
        return view('cliente.index')->with('data', $data);
    }

    public function store(GuardarCliente $form)
    {
        echo "hola";
    }
}
