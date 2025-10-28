<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentMethodRequest extends FormRequest
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
            'method_name'           => 'required|string|min:2|max:255',
            'method_description'    => 'nullable|string|min:3|max:1000',
            'type_typment'          => 'required|string|min:2|max:100',
            'status'                => 'required|string|min:2|max:50',
            'creation_date'         => 'required|date',
            'reference_transaction' => 'required|string|min:3|max:255',
            'authorization_date'    => 'required|date',
            'registration_date'     => 'required|date',
            'commision'             => 'required|integer|min:0',
            'orders_id'             => 'required|integer|min:1|exists:orders,id',
            'payments_id'           => 'required|integer|min:1|exists:payments,id',
        ];
    }

    public function messages(): array
    {
        return [
            // method_name
            'method_name.required' => 'El nombre del método es obligatorio.',
            'method_name.string'   => 'El nombre del método debe ser texto.',
            'method_name.min'      => 'El nombre del método debe tener al menos :min caracteres.',
            'method_name.max'      => 'El nombre del método no puede tener más de :max caracteres.',

            // method_description
            'method_description.string' => 'La descripción debe ser texto.',
            'method_description.min'    => 'La descripción debe tener al menos :min caracteres.',
            'method_description.max'    => 'La descripción no puede tener más de :max caracteres.',

            // type_typment
            'type_typment.required' => 'El tipo de pago es obligatorio.',
            'type_typment.string'   => 'El tipo de pago debe ser texto.',
            'type_typment.min'      => 'El tipo de pago debe tener al menos :min caracteres.',
            'type_typment.max'      => 'El tipo de pago no puede tener más de :max caracteres.',

            // status
            'status.required' => 'El estado es obligatorio.',
            'status.string'   => 'El estado debe ser texto.',
            'status.min'      => 'El estado debe tener al menos :min caracteres.',
            'status.max'      => 'El estado no puede tener más de :max caracteres.',

            // creation_date
            'creation_date.required' => 'La fecha de creación es obligatoria.',
            'creation_date.date'     => 'La fecha de creación debe ser una fecha válida.',

            // reference_transaction
            'reference_transaction.required' => 'La referencia de la transacción es obligatoria.',
            'reference_transaction.string'   => 'La referencia de la transacción debe ser texto.',
            'reference_transaction.min'      => 'La referencia de la transacción debe tener al menos :min caracteres.',
            'reference_transaction.max'      => 'La referencia de la transacción no puede tener más de :max caracteres.',

            // authorization_date
            'authorization_date.required' => 'La fecha de autorización es obligatoria.',
            'authorization_date.date'     => 'La fecha de autorización debe ser una fecha válida.',

            // registration_date
            'registration_date.required' => 'La fecha de registro es obligatoria.',
            'registration_date.date'     => 'La fecha de registro debe ser una fecha válida.',

            // commision
            'commision.required' => 'La comisión es obligatoria.',
            'commision.integer'  => 'La comisión debe ser un número entero.',
            'commision.min'      => 'La comisión no puede ser negativa.',

            // orders_id
            'orders_id.required' => 'El ID del pedido es obligatorio.',
            'orders_id.integer'  => 'El ID del pedido debe ser un número entero.',
            'orders_id.exists'   => 'El pedido especificado no existe.',

            // payments_id
            'payments_id.required' => 'El ID del pago es obligatorio.',
            'payments_id.integer'  => 'El ID del pago debe ser un número entero.',
            'payments_id.exists'   => 'El pago especificado no existe.',
        ];
    }
}
