<?php
namespace Acciona\Http\Api\Comercial\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'email' => 'required|email',
            'ruc' => 'required|unique:pgsql.comercial.clients'
        ];
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'ruc.unique' => 'Campo unico'
        ];
        return $messages;
    }
}