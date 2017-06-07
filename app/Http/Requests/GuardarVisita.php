<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarVisita extends FormRequest
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
            'fecha' => 'required|date_format:Y-m-d',
            'user_id' => 'required|integer|exists:users,id',
            'cliente' => 'required|integer|exists:clientes,id',
            'valor_neto' => 'required|numeric',
            'valor_visita' => 'required|numeric',
            'observaciones' => 'required|max:500',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo es requerido.',
            'max' => 'El campo :attribute puede tener maxímo :max caracteres.',
            'numeric' => 'El campo :attribute debe ser tipo número.',
            'integer' => 'El campo :attribute debe ser tipo entero.',
            'cliente.exists' => 'El campo :attribute debe existir en la tabla Clientes.',
            'user_id.exists' => 'El campo :attribute debe existir en la tabla Vendedores.',
            'date_format' => 'El campo :attribute debe ser una fecha y tener el formato Y-m-d.',
        ];
    }
}
