<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserAuthenticationRequest;
use App\Services\Users\UserService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ResponseTrait;

    private $user_service;

    public function __construct(UserService $user_service)
    {
        $this->user_service = $user_service;
    }

    public function login(UserAuthenticationRequest $request)
    {
        $input = [
            'email' => $request->email,
            'password' => $request->password,
//            'ip_address' => $request->ip_address
        ];
        $user = $this->user_service->checkAuth($input);

        $function = $this->user_service->createToken($user);

        $this->user_service->updateLastLogin(['id' => $user->id]);

        $response = [
            'email' => $user->email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'token' => $function['token'],
            'expires_at' => $function['expires_at'],
        ];

        return $this->showResponse($response);
    }

    public function logout(Request $request)
    {
        $this->user_service->revokeToken($request);
        return $this->showResponse();
    }
}
