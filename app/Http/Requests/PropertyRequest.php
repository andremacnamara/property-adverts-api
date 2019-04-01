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
            'address' => 'sometimes',
            'bathrooms' => 'sometimes',
            'bedrooms' => 'sometimes',
            'building_energy_rating' => 'sometimes',
            'county' => 'sometimes',
            'description' => 'sometimes',
            'eircode' => 'sometimes',
            'postcode' => 'sometimes',
            'price' => 'sometimes',
            'property_type' => 'sometimes',
            'selling_type' => 'sometimes',
            'size' => 'sometimes',
            'town' => 'sometimes',
        ];
    }
}
