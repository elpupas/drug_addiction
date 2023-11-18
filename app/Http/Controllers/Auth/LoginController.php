<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginUserRequest;

class LoginController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        $validatedData = $request->validated();
           
        // Get user's credentials
           $credentials = [
                'email' => $validatedData->email,
                'password' => $validatedData->password,
           ];
           
        // Verify user credentials
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                /** @var \App\Models\User $user * */
                $token = $user->createToken('authToken')->accessToken;
                
                return response()->json([
                    'result' => ['message' => 'Logged in successfully!',
                    'access_token' => $token], 
                    ]
                );
            } else {
                return response()->json(['result' => ['message' => 'Invalid credentials'], 'status' => false], 401);
            }
    }
}
