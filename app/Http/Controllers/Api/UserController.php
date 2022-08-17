<?php

namespace App\Http\Controllers\Api;

use App\Contracts\UserContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserContract $userContract)
    {
        $this->user = $userContract;
    }


    public function register(UserRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->user->fill($request->validated())->save();
        return app(UserService::class)->attempt();
    }

    public function login()
    {
        return app(UserService::class)->attempt('Successfully logged in');
    }

}
