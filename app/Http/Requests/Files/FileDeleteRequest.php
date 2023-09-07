<?php

namespace App\Http\Requests\Files;

use App\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class FileDeleteRequest extends FormRequest
{
    use ValidationTrait;

    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'token' => ['required', 'string'],
        ];
    }
}
