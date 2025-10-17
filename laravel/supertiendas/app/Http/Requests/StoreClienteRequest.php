<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'          => 'required|string|max:100',
            'apellido'        => 'required|string|max:100',
            'direccion'       => 'nullable|string|max:255',
            'fechanacimiento' => 'required|date|before:today',
            'telefono'        => 'required|string|max:20',
            'email'           => 'required|email|unique:clientes,email',
            'genero'          => 'required|in:masculino,femenino,otro',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required'          => 'El nombre es obligatorio.',
            'apellido.required'        => 'El apellido es obligatorio.',
            
            'fechanacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fechanacimiento.before'   => 'La fecha debe ser anterior a hoy.',
            'telefono.required'        => 'El teléfono es obligatorio.',
            'email.required'           => 'El correo electrónico es obligatorio.',
            'email.email'              => 'Debe ingresar un correo válido.',
            'email.unique'             => 'Este correo ya está registrado.',
            'genero.required'          => 'El género es obligatorio.',
            'genero.in'                => 'Debe seleccionar un género válido.',
        ];
    }
}
