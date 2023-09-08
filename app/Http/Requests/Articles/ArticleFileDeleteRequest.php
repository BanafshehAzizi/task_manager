<?php

namespace App\Http\Requests\Articles;

use App\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class ArticleFileDeleteRequest extends FormRequest
{
    use ValidationTrait;

    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge(['article_id' => $this->route('article_id')]);
        $this->merge(['token' => $this->route('token')]);
    }

    public function rules()
    {
        return [
            'article_id' => ['required', 'uuid', 'exists:articles,id'],
            'token' => ['required', 'string'],
        ];
    }
}
