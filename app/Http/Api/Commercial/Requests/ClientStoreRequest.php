<?php
namespace Acciona\Http\Api\Commercial\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'      => 'required',
            'phone'     => 'required',
            'address'   => 'required',
            'ruc'       => 'required',
            'user_id'   => 'required|numeric|exists:pgsql.users.users,usersid',
        ];
    }

    public function messages()
    {
        return [
            'name.required'    => 'El :attribute es requerido',
            'phone.required'   => 'El :attribute es requerido',
            'address.required' => 'El :attribute es requerido',
            'ruc.required'     => 'El :attribute es requerido',
            'ruc.unique'       => 'El :attribute ya se encuentra registrado',
            'user_id.required' => 'El :attribute es requerido',
            'user_id.numeric'  => 'El :attribute acepta solo números',
            'user_id.exists'   => 'El :attribute no existe',
        ];
    }

    public function attributes()
    {
        return [
            'name'     => 'Nombre',
            'contact'  => 'Contacto',
            'phone'    => 'Teléfono',
            'address'  => 'Dirección',
            'email'    => 'Correo',
            'ruc'      => 'Número de RUC',
            'user_id'  => 'Código de Usuario'
        ];
    }
}