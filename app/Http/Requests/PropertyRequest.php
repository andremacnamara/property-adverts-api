<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'address' => 'required',
            'bathrooms' => 'required',
            'bedrooms' => 'required',
            'building_energy_rating' => 'required',
            'county' => 'required',
            'description' => 'required',
            'eircode' => 'required',
            'postcode' => 'required',
            'price' => 'required',
            'property_type' => 'required',
            'selling_type' => 'required',
            'size' => 'required',
            'town' => 'required',
        ];
    }
}
