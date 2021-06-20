<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropiedadRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'nombre' => ['required', 'max:30'],
            'user_id' => ['required','exists:propietarios,id'],
            'tipo' => ['required', 'in:local,piso,atico'],
            'coeficiente' => ['required'],
            'parte' => ['required'],
            'observacion' => ['max:100'],
            'comunidad_activa' => ['required']
        ];
    }

}
