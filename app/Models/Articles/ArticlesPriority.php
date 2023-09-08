<?php

namespace App\Models\Articles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlesPriority extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $table = 'articles_priority';

    public function scopeFilter($query, $request){

    }
}
