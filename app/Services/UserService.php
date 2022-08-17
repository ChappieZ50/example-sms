<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class UserService
{

    public function attempt($message = 'User successfully saved'): \Illuminate\Http\JsonResponse
    {
        $credentials = [
            'email'    => request()->get('email'),
            'password' => request()->get('password'),
        ];
        $token = Auth::guard('api')->attempt($credentials);
        if (!$token) {
            return response()->json([
                'message' => 'Credentials Incorrect'
            ]);
        }
        return response()->json([
            'message' => $message,
            'token'   => $token
        ]);
    }
}
