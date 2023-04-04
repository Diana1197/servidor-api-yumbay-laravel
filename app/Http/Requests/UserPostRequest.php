<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'cedula' => ['required','regex:/(?<province>^[01][1-9]|[2][0-4]|30|10|20)(?<tercer>[0-6])(?<number>[0-9]{7})\b/'],
            'nombres' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'telefono' => 'nullable',
            'celular'=> 'nullable',
            'correo' => 'required|email',
            'especialidades' => 'required',
            'horario' => 'required',
            'numero_emergencia' => 'required'
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'cedula.required' => 'Se requiere el número de cédula.',
            'cedula.regex' => 'Ingrese un número de cédula valido.',
            'nombres.required' => 'Se requiere los nombres.',
            'apellidos.required' => 'Se requiere los apellidos.',
            'direccion.required' => 'Se requiere la dirección.',
            'correo.required' => 'Se require un correo electronico.',
            'correo.email' => 'El correo electronico no es valido.',
            'especialidades.required' => 'Se requiere especialidades',
            'horario.required' => 'Se require un horario',
            'numero_emergencia.required' => 'Se requiere el número de emergencia',
        ];
    }


}
