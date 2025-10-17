<?php

namespace App\Http\Requests\PaymentMethod;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentMethodRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route(strtolower('payment_method'))->id ?? null;

        // en UpdatePaymentMethodRequest::rules()
        return [
            'nombre'      => 'required|string|max:255|unique:payment_methods,nombre,' . $id,
            'descripcion' => 'nullable|string|max:1000',
            'activo'      => 'required|integer|in:0,1',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.unique' => 'Ya existe otro PaymentMethod con ese nombre.',
            'nombre.max' => 'El nombre no puede superar los 255 caracteres.',
            'descripcion.max' => 'La descripción no puede superar los 1000 caracteres.',
            'activo.required' => 'El campo activo es obligatorio',
        ];
    }
}
