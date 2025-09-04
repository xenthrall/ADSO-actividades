<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tipoDocumento' => 'required|string|max:2',
            'dni' => 'required|string|max:10',
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'fechaNacimiento' => 'required|date',
            'genero' => 'required|string|max:1',
            'telefono' => 'required|string|max:15',
            'email' => 'required|email|max:100',
            'direccion' => 'string|max:255',
            'estado' => 'required|string|max:10',
        ];
    }

    public function messages()
{
    return [
        'tipoDocumento.required' => 'El tipo de documento es obligatorio.',
        'tipoDocumento.max' => 'El tipo de documento no puede tener más de 2 caracteres.',

        'dni.required' => 'El número de documento es obligatorio.',
        'dni.max' => 'El número de documento no puede superar los 10 caracteres.',

        'nombre.required' => 'El nombre es obligatorio.',
        'nombre.max' => 'El nombre no puede tener más de 100 caracteres.',

        'apellido.required' => 'El apellido es obligatorio.',
        'apellido.max' => 'El apellido no puede tener más de 100 caracteres.',

        'fechaNacimiento.required' => 'La fecha de nacimiento es obligatoria.',
        'fechaNacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',

        'genero.required' => 'El género es obligatorio.',
        'genero.max' => 'El género debe ser un solo carácter (M/F).',

        'telefono.required' => 'El número de teléfono es obligatorio.',
        'telefono.max' => 'El teléfono no puede tener más de 15 caracteres.',

        'email.required' => 'El correo electrónico es obligatorio.',
        'email.email' => 'Debe ingresar un correo electrónico válido.',
        'email.max' => 'El correo electrónico no puede superar los 100 caracteres.',

        'direccion.max' => 'La dirección no puede tener más de 255 caracteres.',

        'estado.required' => 'El estado es obligatorio.',
        'estado.max' => 'El estado no puede tener más de 10 caracteres.',
    ];
}

}
