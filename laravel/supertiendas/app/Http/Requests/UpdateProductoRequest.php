<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productoId = $this->route('producto'); // Se asume que en la ruta está {producto}

        return [
            'nombre'        => 'required|string|max:255|unique:productos,nombre,' . $productoId,
            'descripcion'   => 'nullable|string|max:500',
            'precio'        => 'required|numeric|min:0',
            'preciocompra'  => 'required|numeric|min:0',
            'stock'         => 'required|integer|min:0',
            'idcategoria'   => 'required|exists:categorias,id',
            'idmarca'       => 'required|exists:marcas,id',
            'estado'        => 'required|in:0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required'       => 'El nombre del producto es obligatorio.',
            'nombre.unique'         => 'Ya existe un producto con ese nombre.',
            'descripcion.string'    => 'La descripción debe ser un texto.',
            'precio.required'       => 'El precio es obligatorio.',
            'precio.numeric'        => 'El precio debe ser numérico.',
            'preciocompra.required' => 'El precio de compra es obligatorio.',
            'stock.required'        => 'El stock es obligatorio.',
            'stock.integer'         => 'El stock debe ser un número entero.',
            'idcategoria.required'  => 'Debes seleccionar una categoría.',
            'idcategoria.exists'    => 'La categoría seleccionada no es válida.',
            'idmarca.required'      => 'Debes seleccionar una marca.',
            'idmarca.exists'        => 'La marca seleccionada no es válida.',
            'estado.required'       => 'El estado es obligatorio.',
            'estado.in'             => 'El estado debe ser Activo (1) o Inactivo (0).',
        ];
    }
}
