<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovimientosRequest extends FormRequest
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
            /*
            'fechaAlta' => 'required',
            'cuenta' => 'required',
            //'grupo'  => 'required',
            //'distribucion' => 'required',
            'fechaValor' => 'required',
            'concepto' => 'required',
            'cantidad' => 'required | numeric',
            'iva' => 'required | numeric',
            'propietario' => 'required'
            */
        ];
    }
}
