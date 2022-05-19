<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
        
        $credentials = $request->only(['email', 'password']);

        try {
            if (!$token = Auth::guard('api')->attempt($credentials)) {
                return response()->json(['error' => 'Acesso não autorizado!'], 401);
            }
        } catch(\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e){
            return response()->json(['error' => $e], 401);
        }

        return $this->respondWithToken($token);
    }


    public function logout(){
        Auth::guard('api')->logout();
        return response()->json([],204); //No-content
    }
    

    public function refresh(){
        $token = Auth::guard('api')->refresh();
        return ['token' => $token]; //No-content
    }


    protected function respondWithToken($token)
    {
        $user = User::where('id', auth('api')->user()->id)->first();
        return response()->json([
            'user'=>$user,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60, 
           
        ]);
    }
}
