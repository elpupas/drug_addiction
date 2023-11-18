<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate inputs
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:8'
           ]);
           
        // Get user's credentials
           $credentials = [
                'dni' => $request->dni,
                'password' => $request->password,
           ];
           
        // Verify user credentials
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $token = $user->createToken('authToken')->accessToken;
                
                return response()->json([
                    'result' => ['message' => 'Logged in successfully!', 
                    'access_token' => $token], 
                    'status' => true]
                );
            } else {
                return response()->json(['result' => ['message' => 'Invalid credentials'], 'status' => false], 401);
            }
    }

}
