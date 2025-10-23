<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngredientRequest extends FormRequest
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
            'ingredient_name'        => 'required|string|min:3|max:255',
            'ingredient_description' => 'required|string|min:3|max:1000',
            'stock_quantity'         => 'required|integer|min:0',
            'ingredient_status'      => 'required|string|min:3|max:50',
            'supplier'               => 'required|string|min:3|max:255',
            'purchase_date'          => 'required|date',
            'unit_price'             => 'required|numeric|min:0',
            'measurement_unit'       => 'required|string|min:1|max:50',
            'total_cost'             => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            // ingredient_name
            'ingredient_name.required' => 'El nombre del ingrediente es obligatorio.',
            'ingredient_name.string'   => 'El nombre del ingrediente debe ser texto.',
            'ingredient_name.min'      => 'El nombre del ingrediente debe tener al menos :min caracteres.',
            'ingredient_name.max'      => 'El nombre del ingrediente no puede tener más de :max caracteres.',

            // ingredient_description
            'ingredient_description.required' => 'La descripción del ingrediente es obligatoria.',
            'ingredient_description.string'   => 'La descripción del ingrediente debe ser texto.',
            'ingredient_description.min'      => 'La descripción del ingrediente debe tener al menos :min caracteres.',
            'ingredient_description.max'      => 'La descripción del ingrediente no puede tener más de :max caracteres.',

            // stock_quantity
            'stock_quantity.required' => 'La cantidad en stock es obligatoria.',
            'stock_quantity.integer'  => 'La cantidad en stock debe ser un número entero.',
            'stock_quantity.min'      => 'La cantidad en stock no puede ser negativa.',

            // ingredient_status
            'ingredient_status.required' => 'El estado del ingrediente es obligatorio.',
            'ingredient_status.string'   => 'El estado del ingrediente debe ser texto.',
            'ingredient_status.min'      => 'El estado del ingrediente debe tener al menos :min caracteres.',
            'ingredient_status.max'      => 'El estado del ingrediente no puede tener más de :max caracteres.',

            // supplier
            'supplier.required' => 'El proveedor es obligatorio.',
            'supplier.string'   => 'El proveedor debe ser texto.',
            'supplier.min'      => 'El proveedor debe tener al menos :min caracteres.',
            'supplier.max'      => 'El proveedor no puede tener más de :max caracteres.',

            // purchase_date
            'purchase_date.required' => 'La fecha de compra es obligatoria.',
            'purchase_date.date'     => 'La fecha de compra debe ser una fecha válida.',

            // unit_price
            'unit_price.required' => 'El precio unitario es obligatorio.',
            'unit_price.numeric'  => 'El precio unitario debe ser un número.',
            'unit_price.min'      => 'El precio unitario no puede ser negativo.',

            // measurement_unit
            'measurement_unit.required' => 'La unidad de medida es obligatoria.',
            'measurement_unit.string'   => 'La unidad de medida debe ser texto.',
            'measurement_unit.min'      => 'La unidad de medida debe tener al menos :min caracteres.',
            'measurement_unit.max'      => 'La unidad de medida no puede tener más de :max caracteres.',

            // total_cost
            'total_cost.required' => 'El costo total es obligatorio.',
            'total_cost.numeric'  => 'El costo total debe ser un número.',
            'total_cost.min'      => 'El costo total no puede ser negativo.',
        ];
    }
}
