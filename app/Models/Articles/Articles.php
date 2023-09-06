<?php

namespace App\Models\Articles;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'title',
        'summary',
        'author_id',
        'status_id',
        'priority_id',
        'published_at'
    ];

    protected $table = 'articles';
}
