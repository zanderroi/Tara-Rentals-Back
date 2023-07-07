<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController
{
    public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $credentials = $request->only('email', 'password');

    // Check if email belongs to the Customer table
    if (Auth::guard('customer')->attempt($credentials)) {
        $user = Auth::guard('customer')->user();
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json(['user' => $user, 'token' => $token], 200);
    }

    // Check if email belongs to the CarOwner table
    if (Auth::guard('carowner')->attempt($credentials)) {
        $user = Auth::guard('carowner')->user();
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json(['user' => $user, 'token' => $token], 200);
    }

    // Invalid credentials
    return response()->json(['message' => 'Invalid credentials'], 401);
}


    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Logout successful'], 200);
    }
}
