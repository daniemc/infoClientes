<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clienteController extends Controller
{
    public function index(){
        $data['paises'] = [];
        $data['departamentos'] = [];
        $data['ciudades'] = [];
        return view('cliente.index')->with('data', $data);
    }
}
