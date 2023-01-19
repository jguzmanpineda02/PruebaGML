<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => 'required|max:100|min:5|regex:/^[\pL\s\-]+$/u',
            'apellido' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
            'cedula' => 'required|numeric|integer|unique:usuarios,cedula|min:1000000|max:9999999999',
            'pais' => 'required',
            'email' => 'required|email|unique:usuarios,email|max:150',
            'direccion' => 'required|max:180',
            'celular' => 'required|numeric|integer|min:1000000000|max:9999999999',
        ];
    }

    public function messages()
    {
        return [
            //Mensajes para la validacion de nombre
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre debe tener maximo 100 caracteres.',
            'nombre.min' => 'El nombre debe tener minimo 5 caracteres.',
            'nombre.regex' => 'Solo se aceptan letras y espacios en el nombre.',
            //Mensajes para la validacion de apellido
            'apellido.required' => 'El apellido es obligatorio.',
            'apellido.max' => 'El apellido debe tener maximo 100 caracteres.',
            'apellido.regex' => 'Solo se aceptan letras y espacios en el apelldo.',
            //Mensajes para la validacion de cedula
            'cedula.required' => 'La cedula es obligatoria.',
            'cedula.numeric' => 'La cedula debe ser solo numeros.',
            'cedula.integer' => 'La cedula no debe contener puntos o comas.',
            'cedula.min' => 'El cedula debe tener entre 7 y 10 digitos.',
            'cedula.max' => 'El cedula debe tener entre 7 y 10 digitos.',
            //Mensajes para la validacion de pais
            'pais.required' => 'El pais es obligatorio.',
            //Mensajes para la validacion de email
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'Email no valido.',
            'email.max' => 'El email debe tener maximo 150 caracteres.',
            'email.unique' => 'El email ya se encuetra registrado.',
            //Mensajes para la validacion de direccion
            'direccion.required' => 'La direccion es obligatoria.',
            'direccion.max' => 'La direccion debe tener maximo 180 caracteres.',
            //Mensajes para la validacion de celular
            'celular.required' => 'El celular es obligatorio.',
            'celular.numeric' => 'El celular deben ser solo numeros.',
            'celular.integer' => 'El celular no debe contener puntos o comas.',
            'celular.min' => 'El celular debe tener 10 digitos.',
            'celular.max' => 'El celular debe tener 10 digitos.',
        ];
    }
}
