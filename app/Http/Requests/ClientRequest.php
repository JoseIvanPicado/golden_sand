<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        'Name' => 'required|string|min:3|max:255',
        'date_of_birth' => 'required|date',
        'gender' => 'required|string|min:5|max:12',
        'nationality' => 'required|string|min:6|max:16',
        'mail' => ['required','string', 'min:8', 'max:255', Rule::unique('clients')->ignore($this->client)],
        'phone_number' => ['required','string', 'min:8', 'max:16', Rule::unique('clients')->ignore($this->client)],
        'address' => 'required|string|min:3|max:255',
        'registration_date' => 'required|date',
        'account_status' => 'required|string|min:3|max:255',
        'password' =>  ['required','string', 'min:6', 'max:20', Rule::unique('clients')->ignore($this->client)],
        ];
    }

    public function messages(): array
    {
        return [
            // Name
            'Name.required' => 'El nombre es obligatorio.',
            'Name.string'   => 'El nombre debe ser texto.',
            'Name.min'      => 'El nombre debe tener al menos :min caracteres.',
            'Name.max'      => 'El nombre no puede tener más de :max caracteres.',

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

            // mail
            'mail.required' => 'El correo electrónico es obligatorio.',
            'mail.string'   => 'El correo electrónico debe ser texto.',
            'mail.min'      => 'El correo electrónico debe tener al menos :min caracteres.',
            'mail.max'      => 'El correo electrónico no puede tener más de :max caracteres.',
            'mail.unique'   => 'El correo electrónico ya está registrado.',

            // phone_number
            'phone_number.required' => 'El número de teléfono es obligatorio.',
            'phone_number.string'   => 'El número de teléfono debe ser texto.',
            'phone_number.min'      => 'El número de teléfono debe tener al menos :min caracteres.',
            'phone_number.max'      => 'El número de teléfono no puede tener más de :max caracteres.',
            'phone_number.unique'   => 'El número de teléfono ya está registrado.',

            // address
            'address.required' => 'La dirección es obligatoria.',
            'address.string'   => 'La dirección debe ser texto.',
            'address.min'      => 'La dirección debe tener al menos :min caracteres.',
            'address.max'      => 'La dirección no puede tener más de :max caracteres.',

            // registration_date
            'registration_date.required' => 'La fecha de registro es obligatoria.',
            'registration_date.date'     => 'La fecha de registro debe ser una fecha válida.',

            // account_status
            'account_status.required' => 'El estado de la cuenta es obligatorio.',
            'account_status.string'   => 'El estado de la cuenta debe ser texto.',
            'account_status.min'      => 'El estado de la cuenta debe tener al menos :min caracteres.',
            'account_status.max'      => 'El estado de la cuenta no puede tener más de :max caracteres.',

            // password
            'password.required' => 'La contraseña es obligatoria.',
            'password.string'   => 'La contraseña debe ser texto.',
            'password.min'      => 'La contraseña debe tener al menos :min caracteres.',
            'password.max'      => 'La contraseña no puede tener más de :max caracteres.',
            'password.unique'   => 'Esa contraseña ya está en uso. Elija otra.',
        ];
    }

}