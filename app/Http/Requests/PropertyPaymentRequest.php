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
            'payment.billing_address' => 'required',
            'payment.town' => 'required',
            'payment.county' => 'required',
        ];
    }
}
