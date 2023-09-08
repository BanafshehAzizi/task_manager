<?php

namespace App\Http\Requests\Users;

use App\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class UserAuthenticationRequest extends FormRequest
{
    use ValidationTrait;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => ['required'],
            'email' => ['required', 'email'],
        ];
    }

}
