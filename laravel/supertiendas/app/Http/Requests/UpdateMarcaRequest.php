<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMarcaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $marcaId = $this->route('marca'); // Si tu ruta usa {marca}

        return [
            'nombre' => 'required|string|max:255|unique:marcas,nombre,' . $marcaId,
            'descripcion' => 'nullable|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required'   => 'El nombre de la marca es obligatorio.',
            'nombre.unique'     => 'Ese nombre ya pertenece a otra marca.',
            'nombre.string'     => 'El nombre debe ser un texto.',
            'descripcion.string'=> 'La descripción debe ser un texto válido.',
        ];
    }
}
