<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function signup(UserRequest $request)
    {
        $validated_request = $request->validated();
        $validated_request['password'] = Hash::make($validated_request['password']);
        User::create($validated_request);
        return response()->json(['message' => 'User has been registered successfully'], 201);
    }

    public function login(UserLoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
            return response()->json(['message' => 'Incorrect email or password'], 401);

        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        $response = ['message' => 'User login successfully', 'token' => $token];
        return response()->json($response, 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'User logout successfully']);
    }
}
