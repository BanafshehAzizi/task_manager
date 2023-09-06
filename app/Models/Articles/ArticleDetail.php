<?php

namespace App\Models\Articles;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleDetail extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'article_id',
        'content',
    ];

    protected $table = 'article_detail';
}
