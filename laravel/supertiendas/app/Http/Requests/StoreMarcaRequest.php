<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMarcaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Se cambia a false si necesitas lógica de autorización
    }

    public function rules(): array
{
    return [
        'nombre' => 'required|string|max:255|unique:marcas,nombre',
        'descripcion' => ['required', 'string', 'max:500', 'not_regex:/^\d+$/'],
    ];
}

public function messages(): array
{
    return [
        'nombre.required'   => 'El nombre de la marca es obligatorio.',
        'nombre.unique'     => 'Ya existe una marca con ese nombre.',
        'nombre.string'     => 'El nombre debe ser un texto.',
        'descripcion.required'=> 'La descripción es un dato requerido.',
        'descripcion.string'=> 'La descripción debe ser un texto válido.',
        'descripcion.not_regex' => 'La descripción no puede ser solo números.',
    ];
}

}
