<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //Api Login Function
    public function login(Request $request)
    {
        //Validate First
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);

        //Get the user
        $user = User::where('email', $request->email)->first();

        //Check The User Email & Password
        //throw exception message when user email not found
        if (!$user) {
            throw ValidationException::withMessages([
                'email' => ['Email Incorrect']
            ]);
        }

        //throw exception message when user password is incorrect
        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => ['Password Incorrect']
            ]);
        }

        //when user & password correct, then generate token
        $token = $user->createToken('api-token')->plainTextToken;

        //then return response in json format
        return response()->json(
            [
                'jwt-token' => $token,
                'user' => new UserResource($user),
            ]
        );
    }

    public function logout(Request $request)
    {
        //check user then delete all the tokens
        $request->user()->tokens()->delete();

        //return success logout message
        return response()->json([
            'message' => 'Logout Successfully'
        ]);
    }
}

