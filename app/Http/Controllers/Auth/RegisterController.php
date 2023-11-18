<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\RegisterUserRequest;

class RegisterController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $register = $request->validated();

        $existingEmail = User::where('email', $register['email'])->first();

        if($existingEmail) {
            
            return response()->json([
                'message' => 'This email already exists.',
            ], 400);

        } else {

        $user = User::create([
            'email' => $register['email'],
            'password' => bcrypt($register['password']),
        ]);

        $accessToken = $user->createToken('register')->accessToken;

        return response()
            ->json([
                'message' => 'You have been registered successfully.',
                'user' => UserResource::make($user),
                'access_token' => $accessToken,
            ]);
        }
    }
}
