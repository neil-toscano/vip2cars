<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $vehicle = $this->route('vehicle');

        return [
            'plate'            => ['required', 'string', 'max:20', 'unique:vehicles,plate,' . $vehicle->id],
            'brand'            => ['required', 'string', 'max:100'],
            'model'            => ['required', 'string', 'max:100'],
            'manufacture_year' => ['required', 'integer', 'min:1900', 'max:' . date('Y')],
            'first_name'       => ['required', 'string', 'max:100'],
            'last_name'        => ['required', 'string', 'max:100'],
            'document_number'  => ['required', 'string', 'max:20', 'unique:clients,document_number,' . $vehicle->client_id],
            'email'            => ['required', 'email', 'unique:clients,email,' . $vehicle->client_id],
            'phone'            => ['required', 'string', 'max:20'],
        ];
    }
    public function messages(): array
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'unique'   => 'El :attribute ya se encuentra registrado.',
            'email'    => 'Debes ingresar un correo electrónico válido.',
            'max'      => 'El campo :attribute no debe exceder los :max caracteres.',
            'integer'  => 'El campo :attribute debe ser un número entero.',
            'min'      => 'El :attribute debe ser al menos del año :min.',
            'manufacture_year.max' => 'El año de fabricación no puede ser mayor al año actual.',
        ];
    }
    public function attributes(): array
    {
        return [
            'plate' => 'placa',
            'brand' => 'marca',
            'model' => 'modelo',
            'manufacture_year' => 'año de fabricación',
            'document_number' => 'número de documento',
            'first_name'       => 'nombre',
            'last_name'        => 'apellido',
            'document_number'  => 'número de documento',
            'email'            => 'correo electrónico',
            'phone'            => 'teléfono',
        ];
    }
}
