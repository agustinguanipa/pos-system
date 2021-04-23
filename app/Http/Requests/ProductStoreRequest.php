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
            'image' => 'required|dimensions:min_width=100,min_height=200',
            'sell_price' => 'required|',
            'category_id' => 'required|integer|exists:App\Category,id',
            'provider_id' => 'requried|integer|exists:App\Provider,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo es requerido',
            'name.string' => 'El valor no es correcto',
            'name.unique' => 'El producto ya esta registrado',
            'name.max' => 'Solo se permiten 255 caracteres',

            'image.required' => 'Este campo es requerido',
            'image.dimensions' => 'Solo se permiten imágenes de 100x200 px',

            'sell_price.required' => 'Este campo es requerido',

            'category_id.required' => 'Este campo es requerido',
            'category_id.integer' => 'El valor tiene que ser entero',
            'category_id.exists' => 'La categoría no existe',

            'provider_id.required' => 'Este campo es requerido',
            'provider_id.integer' => 'El valor tiene que ser entero',
            'provider_id.exists' => 'El proveedor no existe',
        ];
    }
}
