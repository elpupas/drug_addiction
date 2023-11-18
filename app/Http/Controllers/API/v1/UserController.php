<?php

namespace App\Http\Controllers\API\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\RegisterUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return UserResource::make($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user = User::findOrFail($user->id);
        $validatedData = $request->validate();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'age' => $validatedData['age'],
            'gender' => $validatedData['gender'],
            'location' => $validatedData['location'],
            'password' => Hash::make($validatedData['password'])
        ]);

        $user->save();

        if (!$user) {
            return response()->json([
                'result' => [
                    'message' => 'Something went wrong in the process.',
                ],
                'status' => 'false'
            ], 422);
        } else {
            return response()->json([
                'result' => [
                    'message' => 'User updated successfully!',
                    'user' => UserResource::make($user),
                ],
                'status' => 'true'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user = User::findOrFail($user);
        $user->delete();

        return response()->json([
            'result' => [
                'message' => 'User deleted successfully!',
            ]
        ], 204);
    }
}
