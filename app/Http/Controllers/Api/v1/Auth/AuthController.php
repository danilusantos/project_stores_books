<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handle user login.
     *
     * @param  AuthRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(AuthRequest $request)
    {
        // Retrieve user credentials from the request
        $credentials = request(['email', 'password']);

        // Attempt to authenticate the user
        if (!Auth::attempt($credentials)) {
            // Authentication failed, return unauthorized response
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // If authentication succeeds, retrieve the authenticated user
        $user = $request->user();

        // Create a new access token for the authenticated user
        $token = $user->createToken($request->userAgent())->plainTextToken;

        // Return the access token in JSON response
        return response()->json(['token' => $token]);
    }

    /**
     * Handle user logout.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        // Delete the current access token associated with the authenticated user
        $request->user()->currentAccessToken()->delete();

        // Return a JSON response indicating successful logout
        return response()->json(['message' => 'Logged out']);
    }
}
