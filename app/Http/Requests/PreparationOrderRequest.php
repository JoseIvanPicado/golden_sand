<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreparationOrderRequest extends FormRequest
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
            'assignment_date'    => 'required|date',
            'preparation_date'   => 'required|date',
            'start_time'         => 'required|date_format:H:i',
            'end_time'           => 'required|date_format:H:i|after_or_equal:start_time',
            'status'             => 'required|string|min:3|max:50',
            'observations'       => 'nullable|string|max:1000',
            'priority_level'     => 'required|integer|min:1|max:5',
            'amount_items'       => 'required|integer|min:1',
            'assigned_to'        => 'nullable|string|min:2|max:255',
            'products_id'        => 'required|integer|min:1|exists:products,id',
            'employees_id'       => 'required|integer|min:1|exists:employees,id',
        ];
    }

    public function messages(): array
    {
        return [
            // assignment_date
            'assignment_date.required' => 'La fecha de asignación es obligatoria.',
            'assignment_date.date'     => 'La fecha de asignación debe ser una fecha válida.',

            // preparation_date
            'preparation_date.required' => 'La fecha de preparación es obligatoria.',
            'preparation_date.date'     => 'La fecha de preparación debe ser una fecha válida.',

            // start_time
            'start_time.required'    => 'La hora de inicio es obligatoria.',
            'start_time.date_format' => 'La hora de inicio debe tener el formato HH:MM (24h).',

            // end_time
            'end_time.required'       => 'La hora de fin es obligatoria.',
            'end_time.date_format'    => 'La hora de fin debe tener el formato HH:MM (24h).',
            'end_time.after_or_equal' => 'La hora de fin debe ser igual o posterior a la hora de inicio.',

            // status
            'status.required' => 'El estado es obligatorio.',
            'status.string'   => 'El estado debe ser texto.',
            'status.min'      => 'El estado debe tener al menos :min caracteres.',
            'status.max'      => 'El estado no puede tener más de :max caracteres.',

            // observations
            'observations.string' => 'Las observaciones deben ser texto.',
            'observations.max'    => 'Las observaciones no pueden tener más de :max caracteres.',

            // priority_level
            'priority_level.required' => 'El nivel de prioridad es obligatorio.',
            'priority_level.integer'  => 'El nivel de prioridad debe ser un número.',
            'priority_level.min'      => 'El nivel de prioridad mínimo es :min.',
            'priority_level.max'      => 'El nivel de prioridad máximo es :max.',

            // amount_items
            'amount_items.required' => 'La cantidad de ítems es obligatoria.',
            'amount_items.integer'  => 'La cantidad de ítems debe ser un número entero.',
            'amount_items.min'      => 'La cantidad de ítems debe ser como mínimo :min.',

            // assigned_to
            'assigned_to.string' => 'El campo "asignado a" debe ser texto.',
            'assigned_to.min'    => 'El campo "asignado a" debe tener al menos :min caracteres.',
            'assigned_to.max'    => 'El campo "asignado a" no puede tener más de :max caracteres.',

            // products_id
            'products_id.required' => 'El ID del producto es obligatorio.',
            'products_id.integer'  => 'El ID del producto debe ser un número entero.',
            'products_id.exists'   => 'El producto especificado no existe.',

            // employees_id
            'employees_id.required' => 'El ID del empleado es obligatorio.',
            'employees_id.integer'  => 'El ID del empleado debe ser un número entero.',
            'employees_id.exists'   => 'El empleado especificado no existe.',
        ];
    }
}
