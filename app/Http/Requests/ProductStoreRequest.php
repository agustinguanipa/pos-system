<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => 'required|string|unique:products|max:255',
            'sell_price' => 'required|',
            'code'=>'string|nullable|max:8|min:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo es requerido',
            'name.string' => 'El valor no es correcto',
            'name.unique' => 'El producto ya esta registrado',
            'name.max' => 'Solo se permiten 255 caracteres',

            'sell_price.required' => 'Este campo es requerido',

            'code.string' => 'El valor no es correcto',
            'code.max' => 'Solo se permiten 8 dígitos',
            'code.min' => 'Se requieren 8 dígitos',
        ];
    }
}
