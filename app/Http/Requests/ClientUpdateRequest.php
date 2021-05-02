<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
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
            'cedula' => 'required|string|unique:clients,cedula,'.$this->route('client')->id.'|min:7|max:10',
            'rif_number' => 'nullable|string|unique:clients,rif_number,'.$this->route('client')->id.'|min:7|max:11',
            'address' => 'nullable|string|max:255',
            'phone' => 'required|string|unique:clients,phone,'.$this->route('client')->id.'|max:15',
            'email' => 'nullable|string|unique:clients,email,'.$this->route('client')->id.'|max:255|email:rfc,dns',
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
            'cedula.max' => 'Solo se permiten 10 caracteres',
            'cedula.min' => 'Se requieren minimo 7 caracteres',

            'rif_number.string' => 'El valor no es correcto',
            'rif_number.unique' => 'El RIF_number ya esta registrado',
            'rif_number.max' => 'Solo se permiten 11 caracteres',
            'rif_number.min' => 'Se requieren minimo 8 caracteres',

            'address.string' => 'El valor no es correcto',
            'address.max' => 'Solo se permiten 255 caracteres',

            'phone.required' => 'Este campo es requerido',
            'phone.string' => 'El valor no es correcto',
            'phone.unique' => 'El telefono ya esta registrado',
            'phone.max' => 'Solo se permiten 15 caracteres',

            'email.string' => 'El valor no es correcto',
            'email.unique' => 'La dirección de correo electronico ya está registrada',
            'email.max' => 'Solo se permiten 255 caracteres',
            'email.email' => 'Ingrese una dirección de correo electrónico válida',
        ];
    }

}
