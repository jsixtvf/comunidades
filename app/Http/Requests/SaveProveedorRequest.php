<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveProveedorRequest extends FormRequest {

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
            // 'required|string|max:50'

            'fechalta' => 'required|date',
            'cif' => ['required', 'alpha_num', 'size:9', Rule::unique('proveedores')->ignore($this->route('proveedor'))],
            'tipo' => 'required|in:Admin Pública,Telefonía,Agua,Antenas,Antiplaga,Ascensores,
            Comunidad,Desatascos,Electricidad,Electricista,Entidad Financiera,Fontanería,
            Impermeabilizaciones,Jardinería,Jurídico,Limpieza,Piscinas,Porteros automaticos,Puertas garajes,
            Rehabilitación,Seguros',
            'calificacion' => 'required|in:Pésima,Mala,Normal,Buena,Excelente',
            'figura' => 'required|in:Jurídica,Física',
            'nombre' => 'required|string|max:35',
            'apellido1' => 'string|nullable',
            'apellido2' => 'string|nullable',
            'email' => 'email:rfc,filter',
            //integer
            'telefono' => 'string|max:30',
            'calle' => 'string|nullable',
            'portal' => 'integer|nullable',
            'bloque' => 'string|nullable',
            'escalera' => 'string|nullable',
            'piso' => 'integer|nullable',
            'puerta' => 'integer|nullable',
            // 'regex:/^\+\d{3}$/'
            'codigopais' => 'string',
            'cp' => 'required|string|size:5',
            'pais' => 'required|string',
            'provincia' => 'required|string',
            'localidad' => 'required|string',
            // iban ejemplo: AT483200000012345864
            'iban' => 'required|string'
                // string integer enum date
        ];
    }

    public function messages() {

        return [
            'nombre.required' => __('Escriba su denominación social o nombre'),
            'cif.required' => __('Escriba su documento de identificación o pasaporte'),
            'email.required' => __('Escriba su email'),
            'codigopais.required' => __('Indique un código de país válido'),
            'cp.required' => __('Se necesita el código postal'),
            'pais.required' => __('Se necesita indicar el país'),
            'provincia.required' => __('Se necesita indicar una provincia'),
            'localidad.required' => __('Escriba su localidad'),
            'iban.required' => __('Escriba su IBAN')
        ];
    }

}