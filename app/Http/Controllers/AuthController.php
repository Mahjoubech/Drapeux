<?php

namespace App\Http\Controllers;
use Auth;
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
                'token' => $token->plainTextToken
    ];
    }
    public function login(Request $request){
        $field = $request->validate([
            'email' => 'required|string|email|exists:users',
            'password' => 'required',
        ]);
        $user = User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password ,$user->password)){
          return ['message' => 'Incorrect'];
        }
  $token = $user->createToken($user->name);

        return ['user' => $user,
        'token' => $token->plainTextToken
];
    }
    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return ['message' => 'You Are Logout'];


    }
}
