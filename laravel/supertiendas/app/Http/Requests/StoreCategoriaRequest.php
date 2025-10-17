<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriaRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     */
    public function authorize(): bool
    {
        return true; // Cambia a lógica de permisos si es necesario
    }

    /**
     * Reglas de validación para la solicitud.
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255|unique:categorias,nombre',
            'descripcion' => 'required|string|max:500',
        ];
    }

    /**
     * Mensajes personalizados de validación.
     */
    public function messages(): array
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string'   => 'El nombre debe ser una cadena de texto.',
            'nombre.max'      => 'El nombre no puede superar los 255 caracteres.',
            'nombre.unique'   => 'Ya existe una categoría con ese nombre.',
            'descripcion.string' => 'La descripción debe ser una cadena de texto.',
            'descripcion.max'    => 'La descripción no puede superar los 500 caracteres.',
            'descripcion.required' => 'La descripción no puede estar vacía.',
        ];
    }
}
