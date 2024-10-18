<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->hasRole('admin')) {
                $token = $user->createToken('Admin Access Token')->accessToken;
                return response()->json(['token' => $token], 200);
            }

            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(['error' => 'Invalid Credentials'], 401);
    }

    public function register(UserRegistrationRequest $request)
    {
        // Create a new user instance
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign the specified role to the user
        $user->assignRole($request->role);

        // Create an access token with Passport
        $token = $user->createToken('API Token')->accessToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 201);
    }
}
