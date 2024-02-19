<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|',
        ]);

        if (Auth::attempt($credentials)) {

            return response()->json([
                'success' => 'You are logged in',
                'status' => 200,
                //   'token' =>  JWTAuth::attempt($credentials)
                  'token' =>  auth()->user()->createToken($request->password)->plainTextToken,
            ]);
        }

                return response()->json([
                    'error' => 'Your credentials are incorrect',
                    'status' => 401
                ]);

        // if (! $token = auth()->attempt($credentials)) {
        //     return response()->json(['error' => 'Email & Password Not Match'], 401);
        // }

        // return $this->respondWithToken($token);

    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

}

