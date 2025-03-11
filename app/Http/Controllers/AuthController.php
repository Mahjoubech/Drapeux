<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\User;
class AuthController extends Controller
{
    public function register(Request $request)
    {
       $field = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create($field);
  $token = $user->createToken($request->name);
       return ['user' => $user,
                'token' => $token
    ];
    }
    public function login(){

    }
}
