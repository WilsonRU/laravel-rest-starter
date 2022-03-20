<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{
    
    public function __construct(){
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    protected function respondWithToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function login(){
        $credentials = request(['email', 'password']);

        if(!$token = auth()->attempt($credentials)){
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me(){
        return response()->json(['data' => auth()->user()], 200);
    }

    public function logout(){
        auth()->logout();

        return response()->json(['message' => 'Logged out'], 200);
    }

    public function refresh(){
        return $this->respondWithToken(auth()->refresh());
    }
}
