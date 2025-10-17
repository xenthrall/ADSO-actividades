<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('payment'); // o $this->paymentMethod si es con binding

        return [
            'nombre' => 'required|string|max:255|unique:payment_methods,nombre,' . $id,
            'descripcion' => 'nullable|string|max:1000',
            'activo' => 'required|integer|in:0,1',
        ];
    }
}
