<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class UserService
{

    public function attempt($message = 'User successfully saved'): \Illuminate\Http\JsonResponse
    {
        $token = Auth::guard('api')->attempt(request()->only('email', 'password'));
        if (!$token) {
            return response()->json([
                'message' => 'Credentials Incorrect'
            ]);
        }
        return response()->json([
            'message' => $message,
            'token' => $token
        ]);
    }
}
