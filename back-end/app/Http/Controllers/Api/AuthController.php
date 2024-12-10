<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;





class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json(['message' => 'User registered successfully', "user" => $user], 201);
    }



    public function login(Request $request)
{
    $credentials = $request->validate([
        'login' => 'required|string', 
        'password' => 'required|string',
    ]);

    $fieldType = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

    if (Auth::attempt([$fieldType => $credentials['login'], 'password' => $credentials['password']])) {
        $request->session()->regenerate();

        return response()->json(['message' => 'Login successful', 'user' => Auth::user()], 200);
    }

    return response()->json(['message' => 'Invalid credentials'], 401);
}


public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return response()->json(['message' => 'Logged out successfully'], 200);
}

   
   
   
    
}

