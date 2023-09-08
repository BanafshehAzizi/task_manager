<?php

namespace App\Http\Requests\Articles;

use App\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class ArticleDeleteRequest extends FormRequest
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
        ];
    }

}
