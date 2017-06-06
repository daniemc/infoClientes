<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarCliente extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nit' => 'required|string|max:200',
            'nombre' => 'required|string|max:100',
            'direccion' => 'required|string|max:50',
            'telefono' => 'required|string|max:15',
            'pais' => 'required|integer',
            'departamento' => 'required|integer',
            'ciudad' => 'required|integer',
            'cupo' => 'required',
        ];

        
    }

    public function messages()
    {
        return [
            'required' => 'Este campo es requerido.',
            'max' => 'El campo :attribute puede tener maxímo :max caracteres.'
        ];
    }
}
