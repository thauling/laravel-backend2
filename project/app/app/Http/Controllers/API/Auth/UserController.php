<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
Use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function create(Request $request){
        $fields = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required','string','unique:users','email'],
            'password' => ['required', 'string', 'confirmed'] //confirmed needs password_confirmed field!
        ]);
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);
        $token = $user->createToken('showapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        // dd(Auth::id());
        auth()->user()->tokens()->delete();
        return [
            "message" => "logged out"
        ];
    }

    public function login(Request $request){
        $fields = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                "message" => "Credentials not correct"
            ], 401);
        }

        $token = $user->createToken('showapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
  
}
