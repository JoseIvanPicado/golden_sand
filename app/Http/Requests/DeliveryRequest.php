<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryRequest extends FormRequest
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
            'available_status'  => 'required|string|min:3|max:20',
            'assigned_zone'     => 'required|string|min:3|max:100',
            'delivery_person'   => 'nullable|string|min:2|max:255',
            'admission_date'    => 'required|date',
            'departure_time'    => 'required|date_format:H:i',
            'arrival_time'      => 'nullable|date_format:H:i|after_or_equal:departure_time',
            'employees_id'      => 'required|integer|min:1|exists:employees,id',
            'clients_id'        => 'required|integer|min:1|exists:clients,id',
        ];
    }

    public function messages(): array
    {
        return [
            'available_status.required' => 'El estado de disponibilidad es obligatorio.',
            'available_status.string'   => 'El estado de disponibilidad debe ser texto.',
            'available_status.min'      => 'El estado de disponibilidad debe tener al menos :min caracteres.',
            'available_status.max'      => 'El estado de disponibilidad no puede tener más de :max caracteres.',

            'assigned_zone.required' => 'La zona asignada es obligatoria.',
            'assigned_zone.string'   => 'La zona asignada debe ser texto.',
            'assigned_zone.min'      => 'La zona asignada debe tener al menos :min caracteres.',
            'assigned_zone.max'      => 'La zona asignada no puede tener más de :max caracteres.',

            'delivery_person.string' => 'La persona de entrega debe ser texto.',
            'delivery_person.min'    => 'La persona de entrega debe tener al menos :min caracteres.',
            'delivery_person.max'    => 'La persona de entrega no puede tener más de :max caracteres.',

            'admission_date.required' => 'La fecha de admisión es obligatoria.',
            'admission_date.date'     => 'La fecha de admisión debe ser una fecha válida.',

            'departure_time.required'    => 'La hora de salida es obligatoria.',
            'departure_time.date_format' => 'La hora de salida debe tener el formato HH:MM (24h).',

            'arrival_time.date_format'     => 'La hora de llegada debe tener el formato HH:MM (24h).',
            'arrival_time.after_or_equal'  => 'La hora de llegada debe ser igual o posterior a la hora de salida.',

            'employees_id.required' => 'El ID del empleado es obligatorio.',
            'employees_id.integer'  => 'El ID del empleado debe ser un número entero.',
            'employees_id.exists'   => 'El empleado especificado no existe.',

            'clients_id.required' => 'El ID del cliente es obligatorio.',
            'clients_id.integer'  => 'El ID del cliente debe ser un número entero.',
            'clients_id.exists'   => 'El cliente especificado no existe.',
        ];
    }
}
