<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiController extends Controller
{
    //Register API(Post Form-data)
    public function register(Request $request)
    {
        // Data validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        // Create new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Responce
        return response()->json(['message' => 'User created successfully!'], 201);
    }
    
    //Login API(Post Form-data)
    public function login(Request $request)
    {
        // Data validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // JWTAuth and attempt
        $token = JWTAuth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        
        if(!empty($token)){
            return response()->json([
                'status' => true,
                'token' => $token,
                'message' => 'Login successfully!',
            ]);
        }

        //Responce
        return response()->json(['message' => 'Login failed!'], 401);
    }

}
