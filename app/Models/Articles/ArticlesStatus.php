<?php

namespace App\Models\Articles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlesStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $table = 'articles_status';
}
