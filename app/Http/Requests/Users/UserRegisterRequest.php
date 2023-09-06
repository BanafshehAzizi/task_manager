<?php

namespace App\Http\Requests\Users;

use App\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    use ValidationTrait;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'min:2', 'max:255', 'regex:/^[a-zA-Z0-9\s-]+$/i'],
            'last_name' => ['required', 'min:2', 'max:255','regex:/^[a-zA-Z0-9\s-]+$/i'],
            'password' => ['required','min:8', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'],
            'email' => ['required','email','unique:users,email'],
        ];
    }
}
