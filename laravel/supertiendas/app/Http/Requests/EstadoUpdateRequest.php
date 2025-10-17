<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstadoUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cambiar según lógica de autorización
    }

    public function rules(): array
    {
        return [
            'descripcion' => 'required|string|max:255|unique:estados,descripcion,' . $this->route('estado'),
        ];
    }

    public function messages(): array
    {
        return [
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string' => 'La descripción debe ser un texto.',
            'descripcion.max' => 'La descripción no debe exceder los 255 caracteres.',
            'descripcion.unique' => 'Ya existe un estado con esta descripción.',
        ];
    }
}
