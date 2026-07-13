<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthController extends Controller
{
 
     public function Login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);

        $user = User::where('username', $credentials['username'])->first();
        
        if(!$user || !Hash::check($credentials['password'], $user->password)){
            return response()->json([
                "status" => "error",
                "message" => "Username atau Password Salah"
            ], 401);
        };
    
        // $request->session()->regenerate();
        $token = $user->createToken($user->name . "-AuthToken")->plainTextToken;

        return response()->json([
            "access_token" => $token,
            "data" => $user,
            "message" => "Login Berhasil"
        ]);
    }

    public function Logout(){
        Auth::user()->tokens()->delete();
        return response()->json([
            "message" => "Success Logout"
        ]);
    }
}
