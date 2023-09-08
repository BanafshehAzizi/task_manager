<?php

namespace App\Http\Requests\Articles;

use App\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
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
            'author_id' => ['uuid','exists:users,id'],
            'title' => ['string','min:3','max:50'],
            'priority_id' => ['numeric','exists:articles_priority,id'],
            'description' => ['string','min:10','max:65000'],
            'attachments' => ['array'],
            'attachments.*' => ['string','exists:files,token'],
            'published_at' => ['date_format:Y-m-d H:i:s']
        ];
    }
}
