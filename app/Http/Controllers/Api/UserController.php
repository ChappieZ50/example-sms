<?php

namespace App\Http\Controllers\Api;

use App\Contracts\UserContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Services\UserService;

class UserController extends Controller
{
    protected $entity;

    public function __construct(UserContract $entity)
    {
        $this->entity = $entity;
    }


    public function register(RegisterRequest $request, UserService $service): \Illuminate\Http\JsonResponse
    {
        $this->entity->fill($request->validated())->save();
        return $service->attempt();
    }

    public function login(LoginRequest $request, UserService $service)
    {
        return $service->attempt( 'Successfully logged in');
    }

}
