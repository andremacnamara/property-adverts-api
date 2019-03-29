<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyPaymentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'braintree_transaction_id' => 'required',
            'billing_address' => 'required',
            'town' => 'required',
            'county' => 'required',
        ];
    }
}
