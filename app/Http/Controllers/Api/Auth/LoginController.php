<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                  'token' =>  Auth::user()->createToken('todo-api')->plainTextToken,
            ]);
        }

                return response()->json([
                    'error' => 'Your credentials are incorrect',
                    'status' => 401
                ]);

    }

}

