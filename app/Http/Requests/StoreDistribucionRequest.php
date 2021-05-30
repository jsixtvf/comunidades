<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDistribucionRequest extends FormRequest
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
            'orden' => 'required | numeric',
            'abreviatura' => 'required | alpha | max:1',
            'nombre' => 'required | alpha',
            'checkbox' => 'required',
            //'propietario' => 'required',
            'propiedad' => 'required',
            'coeficiente' => 'required',
            'unidadRegistral' => 'required'

        ];
    }

    public function messages(){
        return [
            'checkbox.required' => 'Debes selecionar una propiedad'
        ];
    }
}
