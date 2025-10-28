<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
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
            'item_name'          => 'required|string|min:2|max:255',
            'description'        => 'nullable|string|max:1000',
            'quantity'           => 'required|integer|min:0',
            'location'           => 'required|string|min:2|max:255',
            'unitary_price'      => 'required|numeric|min:0',
            'supplier'           => 'nullable|string|max:255',
            'status_item'        => 'required|string|min:3|max:50',
            'expiration_date'    => 'nullable|date',
            'unit_measure'       => 'required|string|min:1|max:50',
            'added_by_user'      => 'required|string|min:2|max:100',
            'products_id'        => 'required|integer|min:1|exists:products,id',
            'employees_id'       => 'required|integer|min:1|exists:employees,id',
            'orders_details_id'  => 'required|integer|min:1|exists:orders_details,id',
            'ingredients_id'     => 'required|integer|min:1|exists:ingredients,id',
        ];
    }

    public function messages(): array
    {
        return [
            'item_name.required'       => 'El nombre del ítem es obligatorio.',
            'item_name.string'         => 'El nombre del ítem debe ser texto.',
            'item_name.min'            => 'El nombre del ítem debe tener al menos :min caracteres.',
            'item_name.max'            => 'El nombre del ítem no puede tener más de :max caracteres.',

            'description.string'       => 'La descripción debe ser texto.',
            'description.max'          => 'La descripción no puede tener más de :max caracteres.',

            'quantity.required'        => 'La cantidad es obligatoria.',
            'quantity.integer'         => 'La cantidad debe ser un número entero.',
            'quantity.min'             => 'La cantidad no puede ser negativa.',

            'location.required'        => 'La ubicación es obligatoria.',
            'location.string'          => 'La ubicación debe ser texto.',
            'location.min'             => 'La ubicación debe tener al menos :min caracteres.',

            'unitary_price.required'   => 'El precio unitario es obligatorio.',
            'unitary_price.numeric'    => 'El precio unitario debe ser un número.',
            'unitary_price.min'        => 'El precio unitario no puede ser negativo.',

            'supplier.string'          => 'El proveedor debe ser texto.',
            'supplier.max'             => 'El proveedor no puede tener más de :max caracteres.',

            'status_item.required'     => 'El estado del ítem es obligatorio.',
            'status_item.string'       => 'El estado del ítem debe ser texto.',
            'status_item.min'          => 'El estado del ítem debe tener al menos :min caracteres.',

            'expiration_date.date'     => 'La fecha de expiración debe ser una fecha válida.',

            'unit_measure.required'    => 'La unidad de medida es obligatoria.',
            'unit_measure.string'      => 'La unidad de medida debe ser texto.',
            'unit_measure.max'         => 'La unidad de medida no puede tener más de :max caracteres.',

            'added_by_user.required'   => 'El usuario que añade es obligatorio.',
            'added_by_user.string'     => 'El usuario que añade debe ser texto.',
            'added_by_user.min'        => 'El usuario que añade debe tener al menos :min caracteres.',

            'products_id.required'     => 'El ID del producto es obligatorio.',
            'products_id.integer'      => 'El ID del producto debe ser un número entero.',
            'products_id.exists'       => 'El producto especificado no existe.',

            'employees_id.required'    => 'El ID del empleado es obligatorio.',
            'employees_id.integer'     => 'El ID del empleado debe ser un número entero.',
            'employees_id.exists'      => 'El empleado especificado no existe.',

            'orders_details_id.required' => 'El ID de los detalles del pedido es obligatorio.',
            'orders_details_id.integer'  => 'El ID de los detalles del pedido debe ser un número entero.',
            'orders_details_id.exists'   => 'Los detalles del pedido especificados no existen.',

            'ingredients_id.required'  => 'El ID del ingrediente es obligatorio.',
            'ingredients_id.integer'   => 'El ID del ingrediente debe ser un número entero.',
            'ingredients_id.exists'    => 'El ingrediente especificado no existe.',
        ];
    }
}
