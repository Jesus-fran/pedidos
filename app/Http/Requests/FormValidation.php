<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormValidation extends FormRequest
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
            'name' => 'required|min:4|max:40|regex:/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/u',
            'email' => 'required|email||min:6|max:50',
            'tel' => 'required|numeric|digits:10',
            'estado' => 'required|min:5|max:40|regex:/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/u',
            'municipio' => 'required|min:5|max:40|regex:/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/u',
            'cp' => 'required|numeric|digits:5',
            'colonia' => 'required|min:4|max:40|regex:/^[a-zA-Z-0-9\sáéíóúÁÉÍÓÚñÑ]+$/u',
            'calle' => 'required|min:5|max:40|regex:/^[a-zA-Z-0-9\sáéíóúÁÉÍÓÚñÑ]+$/u',
            'terminos' => 'required',
        ];
    }


    public function messages(){
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'name.regex' => 'No debe tener símbolos o números',
            'name.min' => 'El campo nombre debe contener al menos 4 caracteres.',
            'name.max' => 'El campo nombre no debe contener más de 20 caracteres.',
            'email.required' => 'El campo correo es obligatorio',
            'email.min' => 'El campo correo debe contener al menos 6 caracteres.',
            'email.max' => 'El campo correo no debe contener más de 50 caracteres.',
            'tel.required' => 'El campo teléfono es obligatorio',
            'tel.numeric' => 'Deben ser números',
            'tel.digits' => 'El campo teléfono debe contener 10 caracteres.',
            'estado.required' => 'El campo estado es obligatorio',
            'estado.regex' => 'No debe tener símbolos o números',
            'estado.min' => 'El campo estado debe contener al menos 5 caracteres.',
            'estado.max' => 'El campo estado no debe contener más de 40 caracteres.',
            'municipio.required' => 'El campo municipio es obligatorio',
            'municipio.regex' => 'No debe tener símbolos o números',
            'municipio.min' => 'El campo municipio debe contener al menos 5 caracteres.',
            'municipio.max' => 'El campo municipio no debe contener más de 40 caracteres.',
            'cp.required' => 'El campo código postal es obligatorio',
            'cp.numeric' => 'Deben ser números',
            'cp.digits' => 'El campo código postal debe contener 5 caracteres.',
            'colonia.required' => 'El campo colonia es obligatorio',
            'colonia.regex' => 'No debe tener símbolos o números',
            'colonia.min' => 'El campo colonia debe contener al menos 4 caracteres.',
            'colonia.max' => 'El campo colonia no debe contener más de 40 caracteres.',
            'calle.required' => 'El campo calle es obligatorio',
            'calle.regex' => 'No debe tener símbolos o números',
            'calle.min' => 'El campo calle debe contener al menos 5 caracteres.',
            'calle.max' => 'El campo calle no debe contener más de 40 caracteres.',
            'terminos.required' => 'Acepte los términos para continuar',
        ];
    }
}
