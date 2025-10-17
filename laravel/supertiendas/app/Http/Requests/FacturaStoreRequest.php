<?php

namespace App\Http\Requests\Factura;

use Illuminate\Foundation\Http\FormRequest;

class FacturaStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'idcliente'   => 'required|exists:clientes,id',
            'idestado'    => 'required|exists:estados,id',
            'fecha'       => 'required|date',
            'idpago'      => 'required|exists:modospago,id',
            'subtotal'    => 'required|numeric|min:0',
            'impuestos'   => 'required|numeric|min:0',
            'total'       => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'idcliente.required'  => 'Debes seleccionar un cliente.',
            'idestado.required'   => 'Debes seleccionar un estado.',
            'fecha.required'      => 'La fecha es obligatoria.',
            'idpago.required'     => 'Debes seleccionar un método de pago.',
            'subtotal.required'   => 'El subtotal es obligatorio.',
            'impuestos.required'  => 'El impuesto es obligatorio.',
            'total.required'      => 'El total es obligatorio.',
            'numeric'             => 'Este campo debe ser un número.',
            'min'                 => 'El valor no puede ser negativo.',
            'exists'              => 'El valor seleccionado no es válido.',
        ];
    }
}
