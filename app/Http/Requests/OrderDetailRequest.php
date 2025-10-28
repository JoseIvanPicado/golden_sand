<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
      public function rules(): array
    {
        return [
            'description'         => 'required|string|min:3|max:1000',
            'unitary_price'       => 'required|numeric|min:0',
            'available_quantity'  => 'required|integer|min:0',
            'sold_quantity'       => 'required|integer|min:0',
            'total_price'         => 'required|numeric|min:0',
            'authorization_date'  => 'required|date',
            'payments_id'         => 'required|integer|min:1|exists:payments,id',
            'orders_id'           => 'required|integer|min:1|exists:orders,id',
        ];
    }

    public function messages(): array
    {
        return [
            // description
            'description.required' => 'La descripción es obligatoria.',
            'description.string'   => 'La descripción debe ser texto.',
            'description.min'      => 'La descripción debe tener al menos :min caracteres.',
            'description.max'      => 'La descripción no puede tener más de :max caracteres.',

            // unitary_price
            'unitary_price.required' => 'El precio unitario es obligatorio.',
            'unitary_price.numeric'  => 'El precio unitario debe ser un número.',
            'unitary_price.min'      => 'El precio unitario no puede ser negativo.',

            // available_quantity
            'available_quantity.required' => 'La cantidad disponible es obligatoria.',
            'available_quantity.integer'  => 'La cantidad disponible debe ser un número entero.',
            'available_quantity.min'      => 'La cantidad disponible no puede ser negativa.',

            // sold_quantity
            'sold_quantity.required' => 'La cantidad vendida es obligatoria.',
            'sold_quantity.integer'  => 'La cantidad vendida debe ser un número entero.',
            'sold_quantity.min'      => 'La cantidad vendida no puede ser negativa.',

            // total_price
            'total_price.required' => 'El precio total es obligatorio.',
            'total_price.numeric'  => 'El precio total debe ser un número.',
            'total_price.min'      => 'El precio total no puede ser negativo.',

            // authorization_date
            'authorization_date.required' => 'La fecha de autorización es obligatoria.',
            'authorization_date.date'     => 'La fecha de autorización debe ser una fecha válida.',

            // payments_id
            'payments_id.required' => 'El ID de pago es obligatorio.',
            'payments_id.integer'  => 'El ID de pago debe ser un número entero.',
            'payments_id.exists'   => 'El pago especificado no existe.',

            // orders_id
            'orders_id.required' => 'El ID del pedido es obligatorio.',
            'orders_id.integer'  => 'El ID del pedido debe ser un número entero.',
            'orders_id.exists'   => 'El pedido especificado no existe.',
        ];
    }
}
