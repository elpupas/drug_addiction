<?php

namespace App\Http\Controllers\API\v1;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UpdateUserRequest;

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
     * Send email to reset password.
     */
    public function forgetPassword(ForgetRequest $request){

        $email = $request->email;
    
        try{
            // check if user with such email exists
            $user= User::where('email',$email)->first();
    
            if(!$user){
                return response()->json(['error' => 'The email does not exist.'], 404);
            }
    
            // Generate password reset token
            $token = Str::random(10);
    
            // Assign password reset token to user's email in 'password_reset_token' table
            if(DB::table('password_reset_tokens')->where('email', $email)->first()) {
                DB::table('password_reset_tokens')->where('email', $email)->update([ 'token' => $token, ]);
            } else {
                DB::table('password_reset_tokens')->insert([
                    'email' => $email,
                    'token' => $token
                ]); 
            };
    
            //send password reset email
            Mail::to($email)->send(new ForgetPasswordMail($user->name, $token));
    
            // send confirmation response
            return response()->json(['message'=>'Password reset email sent out. Check your email'], 200);
            
    
        }catch(Exception $exception){
    
            return response()->json(['message' => $exception->getMessage()], 404);
    
        }
    
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
