<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image_name'=>'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
        ];
    }
}
