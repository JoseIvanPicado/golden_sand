<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassificationRequest extends FormRequest
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
            'category_name'     => 'required|string|min:3|max:255',
            'description'       => 'nullable|string|max:1000',
            'status'            => 'required|string|min:3|max:50',
            'creation_date'     => 'required|date',
            'modification_date' => 'required|date|after_or_equal:creation_date',
            'reference_image'   => 'nullable|string|max:255',
            'by_user'           => 'required|string|min:2|max:100',
            'products_id'       => 'required|integer|min:1|exists:products,id',
        ];
    }

    public function messages(): array
    {
        return [
            // category_name
            'category_name.required' => 'El nombre de la categoría es obligatorio.',
            'category_name.string'   => 'El nombre de la categoría debe ser texto.',
            'category_name.min'      => 'El nombre de la categoría debe tener al menos :min caracteres.',
            'category_name.max'      => 'El nombre de la categoría no puede tener más de :max caracteres.',

            // description
            'description.string' => 'La descripción debe ser texto.',
            'description.max'    => 'La descripción no puede tener más de :max caracteres.',

            // status
            'status.required' => 'El estado es obligatorio.',
            'status.string'   => 'El estado debe ser texto.',
            'status.min'      => 'El estado debe tener al menos :min caracteres.',
            'status.max'      => 'El estado no puede tener más de :max caracteres.',

            // creation_date
            'creation_date.required' => 'La fecha de creación es obligatoria.',
            'creation_date.date'     => 'La fecha de creación debe ser una fecha válida.',

            // modification_date
            'modification_date.required' => 'La fecha de modificación es obligatoria.',
            'modification_date.date'     => 'La fecha de modificación debe ser una fecha válida.',
            'modification_date.after_or_equal' => 'La fecha de modificación debe ser igual o posterior a la fecha de creación.',

            // reference_image
            'reference_image.string' => 'La referencia de la imagen debe ser texto.',
            'reference_image.max'    => 'La referencia de la imagen no puede tener más de :max caracteres.',

            // by_user
            'by_user.required' => 'El usuario responsable es obligatorio.',
            'by_user.string'   => 'El usuario responsable debe ser texto.',
            'by_user.min'      => 'El usuario responsable debe tener al menos :min caracteres.',
            'by_user.max'      => 'El usuario responsable no puede tener más de :max caracteres.',

            // products_id
            'products_id.required' => 'El ID del producto es obligatorio.',
            'products_id.integer'  => 'El ID del producto debe ser un número entero.',
            'products_id.min'      => 'El ID del producto debe ser como mínimo :min.',
            'products_id.exists'   => 'El producto especificado no existe.',
        ];
    }
}
