<?php

namespace App\Http\Requests\Articles;

use App\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class ArticleInsertRequest extends FormRequest
{
    use ValidationTrait;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
//            'user_id' => ['required','uuid','exists:users,id'],
            'title' => ['required','string','min:3','max:50'],
            'priority_id' => ['required','numeric','exists:articles_priority,id'],
            'description' => ['required','string','min:10','max:65000'],
            'attachments' => ['array'],
            'attachments.*' => ['string','exists:files,token'],
            'published_at' => ['date_format:Y-m-d H:i:s']
        ];
    }
}
