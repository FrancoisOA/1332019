<?php
namespace Acciona\Http\Api\Commercial\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuoteStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'quote' => 'required',
            'quote.client'           => 'required',
            'quote.origin'        => 'required',
            'quote.destination'   => 'required',
        ];

        foreach($this->request->get('quote') as $key => $value)
        {
            if ($key !== 'type_incoterm')
                $rules['quote.'.$key] = 'required';
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'quote.client.required'        => ':attribute es requerido',
            'quote.origin.required'        => ':attribute es requerido',
            'quote.destination.required'   => ':attribute es requerido',
        ];

        foreach($this->request->get('quote') as $key => $value)
        {
            $messages['quote.'.$key.'.required'] = ':attribute es requerido.';
        }

        return $messages;
    }

    public function attributes()
    {
        return [
            'quote.incoterm'            => 'Incoterm',
            'quote.product'             => 'Producto',
            'quote.commercial'          => 'Comercial',
            'quote.payment_method'      => 'Método de pago',
            'quote.via'                 => 'Vía',
            'quote.client'         => 'Cliente',
            'quote.origin'      => 'Puerto Origen',
            'quote.destination' => 'Puerto Destino',
        ];
    }
}