<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name'            => 'required',
            'last_name'             => 'required',
            'username'              => 'required',
            'email'                 => 'required|email|unique:users,email',
            'phone_number'          => 'required|unique:users,phone_number|phone:IE',
            'password'              => 'required',
        ];
    }

    public function messages()
    {
        return [
            'phone_number.phone' => 'The phone number is invalid.',
        ];
    }
}
