<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name'        => 'required|string|min:3|max:255',
            'product_description' => 'required|string|min:3|max:255',
            'price'               => 'required|integer|min:0',
            'weight'              => 'required|integer|min:0',
            'stock_quantity'      => 'required|integer|min:0',
            'product_status'      => 'required|string|min:3|max:50',
            'message'             => 'required|string|min:1|max:255',
            'reference_image'     => 'required|string|min:3|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            // product_name
            'product_name.required' => 'El nombre del producto es obligatorio.',
            'product_name.string'   => 'El nombre del producto debe ser texto.',
            'product_name.min'      => 'El nombre del producto debe tener al menos :min caracteres.',
            'product_name.max'      => 'El nombre del producto no puede tener más de :max caracteres.',

            // product_description
            'product_description.required' => 'La descripción del producto es obligatoria.',
            'product_description.string'   => 'La descripción del producto debe ser texto.',
            'product_description.min'      => 'La descripción del producto debe tener al menos :min caracteres.',
            'product_description.max'      => 'La descripción del producto no puede tener más de :max caracteres.',

            // price
            'price.required' => 'El precio es obligatorio.',
            'price.integer'  => 'El precio debe ser un número entero.',
            'price.min'      => 'El precio debe ser como mínimo :min.',

            // weight
            'weight.required' => 'El peso es obligatorio.',
            'weight.integer'  => 'El peso debe ser un número entero.',
            'weight.min'      => 'El peso debe ser como mínimo :min.',

            // stock_quantity
            'stock_quantity.required' => 'La cantidad en stock es obligatoria.',
            'stock_quantity.integer'  => 'La cantidad en stock debe ser un número entero.',
            'stock_quantity.min'      => 'La cantidad en stock debe ser como mínimo :min.',

            // product_status
            'product_status.required' => 'El estado del producto es obligatorio.',
            'product_status.string'   => 'El estado del producto debe ser texto.',
            'product_status.min'      => 'El estado del producto debe tener al menos :min caracteres.',
            'product_status.max'      => 'El estado del producto no puede tener más de :max caracteres.',

            // message
            'message.required' => 'El mensaje es obligatorio.',
            'message.string'   => 'El mensaje debe ser texto.',
            'message.min'      => 'El mensaje debe tener al menos :min caracteres.',
            'message.max'      => 'El mensaje no puede tener más de :max caracteres.',

            // reference_image
            'reference_image.required' => 'La referencia de la imagen es obligatoria.',
            'reference_image.string'   => 'La referencia de la imagen debe ser texto.',
            'reference_image.min'      => 'La referencia de la imagen debe tener al menos :min caracteres.',
            'reference_image.max'      => 'La referencia de la imagen no puede tener más de :max caracteres.',
        ];
    }
}
