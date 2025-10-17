<?php

namespace App\Http\Requests\Estado;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstadoRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'descripcion' => 'required|string|max:10',
        ];
    }

    public function messages()
    {
        return [
            'descripcion.required' => 'El campo descripcion es obligatorio.',
            'descripcion.max' => 'La descripción no puede superar los 1000 caracteres.',
        ];
    }
}