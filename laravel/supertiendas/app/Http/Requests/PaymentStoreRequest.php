<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255|unique:payment_methods,nombre',
            'descripcion' => 'nullable|string|max:1000',
            'activo' => 'required|integer|in:0,1',
        ];
    }
}
