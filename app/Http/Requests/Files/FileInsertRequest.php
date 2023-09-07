<?php

namespace App\Http\Requests\Files;

use App\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class FileInsertRequest extends FormRequest
{
    use ValidationTrait;

    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'files' => ['required','array', 'max:3'],//new UniqueInArrayRule('name', __('validation.attributes.file_name'))
            'browser_name' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s_-]+$/'],//harchizi betune vared kone natune inject kone
            'ip_address' => ['required', 'ip']
        ];
    }
}
