<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class AuthController extends Controller
{
    public function register() 
    {
        $user =  User::create(['name' => request('name'), 'email' => request('email'), 'email_verified_at' => request('email_verified_at'), 'password' => bcrypt(request('password'))]);
        return response()->json($user);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json(auth()->user());
        }

        return response()->json(['message' => 'Failed to authenticate'], 401);
    }
}
