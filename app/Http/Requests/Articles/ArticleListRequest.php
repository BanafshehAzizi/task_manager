<?php

namespace App\Http\Requests\Articles;

use App\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleListRequest extends FormRequest
{
    use ValidationTrait;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'order_by_column' => 'string',
            'order_by_direction' => Rule::in(['asc', 'desc']),
            'offset' => 'numeric',
            'limit' => 'numeric'
        ];
    }
}
