<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
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
            'cedula' => 'required|string|unique:clients|min:7|max:10',
            'rif_number' => 'nullable|string|unique:clients|min:7|max:11',
            'address' => 'nullable|string|max:255',
            'phone' => 'required|string|unique:clients|max:15',
            'email' => 'nullable|string|unique:clients|max:255|email:rfc,dns',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo es requerido',
            'name.string' => 'El valor no es correcto',
            'name.max' => 'Solo se permiten 255 caracteres',

            'cedula.required' => 'Este campo es requerido',
            'cedula.string' => 'El valor no es correcto',
            'cedula.unique' => 'La cedula ya esta registrada',
            'cedula.min' => 'Se requiere mínimo 7 caracteres',
            'cedula.max' => 'Solo se permiten máximo 10 caracteres',
            
            'rif_number.string' => 'El valor no es correcto',
            'rif_number.unique' => 'El RIF ya esta registrado',
            'rif_number.min' => 'Se requiere mínimo 7 caracteres',
            'rif_number.max' => 'Solo se permiten máximo 11 caracteres',
            
            'address.required' => 'Este campo es requerido',
            'address.string' => 'El valor no es correcto',
            'address.max' => 'Solo se permiten 255 caracteres',

            'phone.required' => 'Este campo es requerido',
            'phone.string' => 'El valor no es correcto',
            'phone.unique' => 'El telefono ya esta registrado',
            'pone.max' => 'Solo se permiten máximo 15 caracteres',
            
            'email.required' => 'Este campo es requerido',
            'email.string' => 'El valor no es correcto',
            'email.unique' => 'La dirección de correo electronico ya está registrada',
            'email.max' => 'Solo se permiten 255 caracteres',
            'email.email' => 'Ingrese una dirección de correo electrónico válida',
        ];
    }
}
