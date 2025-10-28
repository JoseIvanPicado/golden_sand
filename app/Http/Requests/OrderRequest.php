<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'order_status'     => 'required|string|min:3|max:50',
            'order_date'       => 'required|date',
            'order_time'       => 'required|date_format:H:i',
            'delivery_type'    => 'required|string|min:3|max:100',
            'delivery_address' => 'required|string|min:5|max:255',
            'estimated_time'   => 'required|date_format:H:i',
            'quantity'         => 'required|integer|min:1',
            'unit_price'       => 'required|integer|min:0',
            'total_amount'     => 'required|integer|min:0',
            'delivery_status'  => 'required|string|min:3|max:50',
            'client_id'        => 'required|integer|min:1|exists:clients,id',
            'order_details_id' => 'required|integer|min:1|exists:order_details,id',
        ];
    }

    public function messages(): array
    {
        return [
            // order_status
            'order_status.required' => 'El estado del pedido es obligatorio.',
            'order_status.string'   => 'El estado del pedido debe ser texto.',
            'order_status.min'      => 'El estado del pedido debe tener al menos :min caracteres.',
            'order_status.max'      => 'El estado del pedido no puede tener más de :max caracteres.',

            // order_date
            'order_date.required' => 'La fecha del pedido es obligatoria.',
            'order_date.date'     => 'La fecha del pedido debe ser una fecha válida.',

            // order_time
            'order_time.required'    => 'La hora del pedido es obligatoria.',
            'order_time.date_format' => 'La hora del pedido debe tener el formato HH:MM (24h).',

            // delivery_type
            'delivery_type.required' => 'El tipo de entrega es obligatorio.',
            'delivery_type.string'   => 'El tipo de entrega debe ser texto.',
            'delivery_type.min'      => 'El tipo de entrega debe tener al menos :min caracteres.',
            'delivery_type.max'      => 'El tipo de entrega no puede tener más de :max caracteres.',

            // delivery_address
            'delivery_address.required' => 'La dirección de entrega es obligatoria.',
            'delivery_address.string'   => 'La dirección de entrega debe ser texto.',
            'delivery_address.min'      => 'La dirección de entrega debe tener al menos :min caracteres.',
            'delivery_address.max'      => 'La dirección de entrega no puede tener más de :max caracteres.',

            // estimated_time
            'estimated_time.required'    => 'El tiempo estimado es obligatorio.',
            'estimated_time.date_format' => 'El tiempo estimado debe tener el formato HH:MM (24h).',

            // quantity
            'quantity.required' => 'La cantidad es obligatoria.',
            'quantity.integer'  => 'La cantidad debe ser un número entero.',
            'quantity.min'      => 'La cantidad debe ser como mínimo :min.',

            // unit_price
            'unit_price.required' => 'El precio unitario es obligatorio.',
            'unit_price.integer'  => 'El precio unitario debe ser un número entero.',
            'unit_price.min'      => 'El precio unitario no puede ser negativo.',

            // total_amount
            'total_amount.required' => 'El monto total es obligatorio.',
            'total_amount.integer'  => 'El monto total debe ser un número entero.',
            'total_amount.min'      => 'El monto total no puede ser negativo.',

            // delivery_status
            'delivery_status.required' => 'El estado de la entrega es obligatorio.',
            'delivery_status.string'   => 'El estado de la entrega debe ser texto.',
            'delivery_status.min'      => 'El estado de la entrega debe tener al menos :min caracteres.',
            'delivery_status.max'      => 'El estado de la entrega no puede tener más de :max caracteres.',

            // client_id
            'client_id.required' => 'El ID del cliente es obligatorio.',
            'client_id.integer'  => 'El ID del cliente debe ser un número entero.',
            'client_id.exists'   => 'El cliente especificado no existe.',

            // order_details_id
            'order_details_id.required' => 'El ID de los detalles del pedido es obligatorio.',
            'order_details_id.integer'  => 'El ID de los detalles del pedido debe ser un número entero.',
            'order_details_id.exists'   => 'Los detalles del pedido especificados no existen.',
        ];
    }
}
