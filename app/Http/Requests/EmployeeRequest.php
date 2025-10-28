<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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
            'employee_name'           => 'required|string|min:3|max:255',
            'date_of_birth'           => 'required|date',
            'gender'                  => 'required|string|min:3|max:20',
            'nationality'             => 'required|string|min:2|max:100',
            'residence_departament'   => 'required|string|min:2|max:100',
            'address'                 => 'required|string|min:5|max:255',
            'identification'          => ['required','string','min:5','max:20', Rule::unique('employees','identification')->ignore($this->employee)],
            'mail'                    => ['required','email','max:255', Rule::unique('employees','mail')->ignore($this->employee)],
            'phone_number'            => 'required|numeric',
            'hire_date'               => 'required|date',
            'number_employee'         => ['required','string','min:1','max:50', Rule::unique('employees','number_employee')->ignore($this->employee)],
            'role_work'               => 'required|string|min:3|max:100',
            'account_status'          => 'required|string|min:3|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            // employee_name
            'employee_name.required' => 'El nombre del empleado es obligatorio.',
            'employee_name.string'   => 'El nombre del empleado debe ser texto.',
            'employee_name.min'      => 'El nombre del empleado debe tener al menos :min caracteres.',
            'employee_name.max'      => 'El nombre del empleado no puede tener más de :max caracteres.',

            // date_of_birth
            'date_of_birth.required' => 'La fecha de nacimiento es obligatoria.',
            'date_of_birth.date'     => 'La fecha de nacimiento debe ser una fecha válida.',

            // gender
            'gender.required' => 'El género es obligatorio.',
            'gender.string'   => 'El género debe ser texto.',
            'gender.min'      => 'El género debe tener al menos :min caracteres.',
            'gender.max'      => 'El género no puede tener más de :max caracteres.',

            // nationality
            'nationality.required' => 'La nacionalidad es obligatoria.',
            'nationality.string'   => 'La nacionalidad debe ser texto.',
            'nationality.min'      => 'La nacionalidad debe tener al menos :min caracteres.',
            'nationality.max'      => 'La nacionalidad no puede tener más de :max caracteres.',

            // residence_departament
            'residence_departament.required' => 'El departamento de residencia es obligatorio.',
            'residence_departament.string'   => 'El departamento de residencia debe ser texto.',
            'residence_departament.min'      => 'El departamento de residencia debe tener al menos :min caracteres.',
            'residence_departament.max'      => 'El departamento de residencia no puede tener más de :max caracteres.',

            // address
            'address.required' => 'La dirección es obligatoria.',
            'address.string'   => 'La dirección debe ser texto.',
            'address.min'      => 'La dirección debe tener al menos :min caracteres.',
            'address.max'      => 'La dirección no puede tener más de :max caracteres.',

            // identification
            'identification.required' => 'La identificación es obligatoria.',
            'identification.string'   => 'La identificación debe ser texto.',
            'identification.min'      => 'La identificación debe tener al menos :min caracteres.',
            'identification.max'      => 'La identificación no puede tener más de :max caracteres.',
            'identification.unique'   => 'La identificación ya está registrada.',

            // mail
            'mail.required' => 'El correo electrónico es obligatorio.',
            'mail.email'    => 'El correo electrónico debe ser una dirección válida.',
            'mail.max'      => 'El correo electrónico no puede tener más de :max caracteres.',
            'mail.unique'   => 'El correo electrónico ya está registrado.',

            // phone_number
            'phone_number.required' => 'El número de teléfono es obligatorio.',
            'phone_number.numeric'  => 'El número de teléfono debe ser numérico.',

            // hire_date
            'hire_date.required' => 'La fecha de contratación es obligatoria.',
            'hire_date.date'     => 'La fecha de contratación debe ser una fecha válida.',

            // number_employee
            'number_employee.required' => 'El número interno del empleado es obligatorio.',
            'number_employee.string'   => 'El número interno del empleado debe ser texto.',
            'number_employee.min'      => 'El número interno debe tener al menos :min caracteres.',
            'number_employee.max'      => 'El número interno no puede tener más de :max caracteres.',
            'number_employee.unique'   => 'El número interno ya está en uso.',

            // role_work
            'role_work.required' => 'El rol de trabajo es obligatorio.',
            'role_work.string'   => 'El rol de trabajo debe ser texto.',
            'role_work.min'      => 'El rol de trabajo debe tener al menos :min caracteres.',
            'role_work.max'      => 'El rol de trabajo no puede tener más de :max caracteres.',

            // account_status
            'account_status.required' => 'El estado de la cuenta es obligatorio.',
            'account_status.string'   => 'El estado de la cuenta debe ser texto.',
            'account_status.min'      => 'El estado de la cuenta debe tener al menos :min caracteres.',
            'account_status.max'      => 'El estado de la cuenta no puede tener más de :max caracteres.',
        ];
    }
}
