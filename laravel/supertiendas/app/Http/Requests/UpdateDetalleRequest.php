<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDetalleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'idfactura' => 'required|exists:facturas,id',
            'idproducto' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'preciounitario' => 'required|numeric|min:0',
            'totallinea' => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'idfactura.required' => 'La factura es obligatoria.',
            'idfactura.exists' => 'La factura seleccionada no existe.',
            'idproducto.required' => 'El producto es obligatorio.',
            'idproducto.exists' => 'El producto seleccionado no existe.',
            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad mínima debe ser 1.',
            'preciounitario.required' => 'El precio unitario es obligatorio.',
            'preciounitario.numeric' => 'El precio unitario debe ser un número.',
            'totallinea.required' => 'El total de línea es obligatorio.',
            'totallinea.numeric' => 'El total de línea debe ser un número.',
        ];
    }
}
