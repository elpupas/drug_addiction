<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout ()
    {
        $user = Auth::user();
        /** @var \App\Models\User $user * */
        $user->tokens()->delete();

        return response()->json(['message' => 'Successfully logged out'], 200);
    
    }
}
