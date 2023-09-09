<?php

namespace App\Http\Requests\Articles;

use App\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class ArticleFileInsertRequest extends FormRequest
{
    use ValidationTrait;

    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge(['article_id' => $this->route('article_id')]);
    }

    public function rules()
    {
        return [
            'article_id' => ['required', 'uuid', 'exists:articles,id'],
            'files' => ['required','array', 'max:3'],
            'browser_name' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s_-]+$/'],
//            'ip_address' => ['required', 'ip']
        ];
    }

}
