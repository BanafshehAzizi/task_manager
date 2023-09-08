<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\ArticleListRequest;
use App\Http\Requests\Users\UserRegisterRequest;
use App\Services\Users\UserService;
use App\Traits\ResponseTrait;

class UserController extends Controller
{
    use ResponseTrait;
    private $user_service;

    public function __construct(UserService $user_service)
    {
        $this->user_service = $user_service;
    }

    public function register(UserRegisterRequest $request)
    {
        $input = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => md5($request->password),
            'email' => $request->email,
        ];
        $function = $this->user_service->insert($input);

        $function = $this->user_service->createToken($function);

        return $this->showResponse($function);
    }

    public function list(ArticleListRequest $request)
    {
        $function = $this->user_service->list($request);
        return $this->showResponse($function);
    }

}
