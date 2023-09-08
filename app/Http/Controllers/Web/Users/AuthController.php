<?php

namespace App\Http\Controllers\Web\Users;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('login')->with([
            'title' => 'Login'
        ]);
    }
}
