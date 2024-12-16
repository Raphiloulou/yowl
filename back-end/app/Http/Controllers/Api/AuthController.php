<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    
    public function signup(Request $request)
    {
        try {
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

            return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error.',
                'errors' => $e->errors(),
            ], 422);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 400);
        }
    }

    
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'login' => 'required|string',  
                'password' => 'required|string',
            ]);

            $fieldType = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            if (Auth::attempt([$fieldType => $credentials['login'], 'password' => $credentials['password']])) {
                $user = Auth::user();

                return response()->json([
                    'message' => 'Login successful',
                    'user' => $user,
                ], 200);
            }

            throw new Exception('Invalid credentials.');

        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error.',
                'errors' => $e->errors(),
            ], 422);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 400);
        }
    }

    
    public function logout()
{
    try {
        Auth::logout(); 

        return response()->json(['message' => 'Logged out successfully'], 200);
    } catch (Exception $e) {
        return response()->json(['message' => 'Error: ' . $e->getMessage()], 400);
    }
}
}

