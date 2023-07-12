<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    public function customerLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return response()->json(['token' => $token]);
    }

    public function carOwnerLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return response()->json(['token' => $token]);
    }

    public function customerLogout()
    {
        // JWTAuth::invalidate();
        auth()->logout();
        return response()->json(['message' => 'Logged out successfully']);
    }

    public function carOwnerLogout()
    {
        JWTAuth::invalidate();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
