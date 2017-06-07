<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GuardarCliente;
use App\Http\Requests\EditarCliente;
use App\clientes;
use App\paises;
use App\departamentos;
use App\ciudades;
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
            'nit' => encrypt($form->nit),
            'nombre' => $form->nombre,
            'direccion' => $form->direccion,
            'telefono' => $form->telefono,
            'paises_id' => $form->pais,
            'departamentos_id' => $form->departamento,
            'ciudades_id' => $form->ciudad,
            'cupo' => $form->cupo,
        ]);

        return $this->redirectToIndex();
    }

    public function edit($id)
    {
        $cliente = clientes::find($id);
        $pais = $cliente->paises->id;
        $departamento = $cliente->departamentos->id;
        $ciudad = $cliente->ciudades->id;

        return view(
                'clientes.edit',
                [
                    'cliente' => $cliente,
                    'clientes' => clientes::all(),
                    'pais_actual' => $pais,
                    'paises' => paises::all(),
                    'departamento_actual' => $departamento,
                    'departamentos' => paises::find($pais)->departamentos,
                    'ciudad_actual' => $ciudad,
                    'ciudades' => departamentos::find($departamento)->ciudades,
                ]
            );
    }

    public function update(EditarCliente $form, $id)
    {        
        clientes::where('id', $id)
                ->update([
                    'nit' => encrypt($form->nit),
                    'nombre' => $form->nombre,
                    'direccion' => $form->direccion,
                    'telefono' => $form->telefono,
                    'paises_id' => $form->pais,
                    'departamentos_id' => $form->departamento,
                    'ciudades_id' => $form->ciudad,
                    'cupo' => $form->cupo,
                ]);
        return $this->redirectToIndex();
    }

    public function destroy($id)
    {
        $cliente = clientes::destroy($id);        
        return $this->redirectToIndex();
    }

    protected function redirectToIndex()
    {
        return redirect()->route('cliente.index');
    }

    
}
