<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
     
        return $user->createToken('user login')->plainTextToken;
    }

    public function logout(Request $request)
    {
        // Revoke all tokens...
        // $user->tokens()->delete();
        
        // Revoke the token that was used to authenticate the current request...
        $request->user()->currentAccessToken()->delete();
        
        // Revoke a specific token...
        // $user->tokens()->where('id', $tokenId)->delete();
    }

    public function me(Request $request)
    {
        return response()->json(Auth::user());
    }
}
