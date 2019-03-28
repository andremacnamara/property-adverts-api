<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AuthController extends Controller
{
    public function register() 
    {
        $user =  User::create(['name' => request('name'), 'email' => request('email'), 'email_verified_at' => request('email_verified_at'), 'password' => bcrypt(request('password'))]);
        return response()->json($user);
    }

    public function login()
    {
        
    }
}
