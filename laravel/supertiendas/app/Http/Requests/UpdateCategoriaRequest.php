<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoriaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Obtenemos el ID de la categoría actual desde la ruta
        $categoriaId = $this->route('categoria');

        return [
            'nombre' => 'required|string|max:255|unique:categorias,nombre,' . $categoriaId,
            'descripcion' => 'nullable|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string'   => 'El nombre debe ser una cadena de texto.',
            'nombre.max'      => 'El nombre no puede superar los 255 caracteres.',
            'nombre.unique'   => 'Ya existe una categoría con ese nombre.',
            'descripcion.string' => 'La descripción debe ser una cadena de texto.',
            'descripcion.max'    => 'La descripción no puede superar los 500 caracteres.',
        ];
    }
}
