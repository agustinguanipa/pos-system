<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:200|unique:providers', 
            'rif_number' => 'required|string|max:11|min:11|unique:providers', 
            'address' => 'nullable|string|max:255', 
            'phone' => 'required|string|max:15|min:10|unique:providers',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo es requerido',
            'name.string' => 'El valor no es correcto',
            'name.max' => 'Solo se permiten 255 caracteres',

            'email.required' => 'Este campo es requerido',
            'email.email' => 'No es un correo electrónico',
            'email.string' => 'El valor no es correcto',
            'email.max' => 'Solo se permiten 255 caracteres',
            'email.unique' => 'Ya se encuentra registrado',

            'rif_number.required' => 'Este campo es requerido',
            'rif_number.string' => 'El valor no es correcto',
            'rif_number.max' => 'Solo se permiten 11 caracteres',
            'rif_number.min' => 'Se requieren 11 caracteres',
            'rif_number.unique' => 'Ya se encuentra registrado',

            'address.max' => 'Solo se permiten 255 caracteres',
            'adresss.string' => 'El valor no es correcto',

            'phone.required' => 'Este campo es requerido',
            'phone.string' => 'El valor no es correcto',
            'phone.max' => 'Solo se permiten 9 caracteres',
            'phone.min' => 'Se requiere de 9 caracteres',
            'phone.unique' => 'Ya se encuentra registrado',
        ];
    }
}
