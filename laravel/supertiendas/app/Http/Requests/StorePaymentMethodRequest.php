<?php

namespace App\Http\Requests\PaymentMethod;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentMethodRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255|unique:' . strtolower('Payment_Method') . 's,nombre',
            'descripcion' => 'nullable|string|max:1000',
            'activo' => 'required|integer|max:1',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.unique' => 'Ya existe una PaymentMethod con ese nombre.',
            'nombre.max' => 'El nombre no puede superar los 255 caracteres.',
            'descripcion.max' => 'La descripción no puede superar los 1000 caracteres.',
            'activo.require' => 'El campo activo es obligatorio',

        ];
    }
}