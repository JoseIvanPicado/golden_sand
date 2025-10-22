<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'transaction_reference' => 'required|string|min:3|max:255',
            'payment_date'         => 'required|date',
            'total_amount'         => 'required|integer|min:0',
            'payment_method'       => 'required|string|min:3|max:100',
            'amount_paid'          => 'required|integer|min:0',
            'change'               => 'required|string|min:1|max:255',
            'authorization_code'   => 'required|string|min:3|max:255',
            'authorization_date'   => 'required|date',
            'point_terminal'       => 'required|string|min:2|max:255',
            'payment_status'       => 'required|string|min:3|max:50',
            'commision'            => 'required|string|min:1|max:100',
            'due_date'             => 'required|string|min:3|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            // transaction_reference
            'transaction_reference.required' => 'La referencia de la transacción es obligatoria.',
            'transaction_reference.string'   => 'La referencia de la transacción debe ser texto.',
            'transaction_reference.min'      => 'La referencia de la transacción debe tener al menos :min caracteres.',
            'transaction_reference.max'      => 'La referencia de la transacción no puede tener más de :max caracteres.',

            // payment_date
            'payment_date.required' => 'La fecha de pago es obligatoria.',
            'payment_date.date'     => 'La fecha de pago debe ser una fecha válida.',

            // total_amount
            'total_amount.required' => 'El monto total es obligatorio.',
            'total_amount.integer'  => 'El monto total debe ser un número entero.',
            'total_amount.min'      => 'El monto total debe ser como mínimo :min.',

            // payment_method
            'payment_method.required' => 'El método de pago es obligatorio.',
            'payment_method.string'   => 'El método de pago debe ser texto.',
            'payment_method.min'      => 'El método de pago debe tener al menos :min caracteres.',
            'payment_method.max'      => 'El método de pago no puede tener más de :max caracteres.',

            // amount_paid
            'amount_paid.required' => 'El monto pagado es obligatorio.',
            'amount_paid.integer'  => 'El monto pagado debe ser un número entero.',
            'amount_paid.min'      => 'El monto pagado debe ser como mínimo :min.',

            // change
            'change.required' => 'El cambio es obligatorio.',
            'change.string'   => 'El cambio debe ser texto.',
            'change.min'      => 'El cambio debe tener al menos :min caracteres.',
            'change.max'      => 'El cambio no puede tener más de :max caracteres.',

            // authorization_code
            'authorization_code.required' => 'El código de autorización es obligatorio.',
            'authorization_code.string'   => 'El código de autorización debe ser texto.',
            'authorization_code.min'      => 'El código de autorización debe tener al menos :min caracteres.',
            'authorization_code.max'      => 'El código de autorización no puede tener más de :max caracteres.',

            // authorization_date
            'authorization_date.required' => 'La fecha de autorización es obligatoria.',
            'authorization_date.date'     => 'La fecha de autorización debe ser una fecha válida.',

            // point_terminal
            'point_terminal.required' => 'El terminal/punto es obligatorio.',
            'point_terminal.string'   => 'El terminal/punto debe ser texto.',
            'point_terminal.min'      => 'El terminal/punto debe tener al menos :min caracteres.',
            'point_terminal.max'      => 'El terminal/punto no puede tener más de :max caracteres.',

            // payment_status
            'payment_status.required' => 'El estado del pago es obligatorio.',
            'payment_status.string'   => 'El estado del pago debe ser texto.',
            'payment_status.min'      => 'El estado del pago debe tener al menos :min caracteres.',
            'payment_status.max'      => 'El estado del pago no puede tener más de :max caracteres.',

            // commision
            'commision.required' => 'La comisión es obligatoria.',
            'commision.string'   => 'La comisión debe ser texto.',
            'commision.min'      => 'La comisión debe tener al menos :min caracteres.',
            'commision.max'      => 'La comisión no puede tener más de :max caracteres.',

            // due_date
            'due_date.required' => 'La fecha de vencimiento es obligatoria.',
            'due_date.string'   => 'La fecha de vencimiento debe ser texto.',
            'due_date.min'      => 'La fecha de vencimiento debe tener al menos :min caracteres.',
            'due_date.max'      => 'La fecha de vencimiento no puede tener más de :max caracteres.',
        ];
    }

}
