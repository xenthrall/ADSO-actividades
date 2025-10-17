<?php

namespace App\Http\Requests\Factura;

use Illuminate\Foundation\Http\FormRequest;

class FacturaUpdateRequest extends FormRequest
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
        return (new FacturaStoreRequest())->messages(); // Reutiliza los mismos mensajes
    }
}
