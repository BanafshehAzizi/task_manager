<?php

namespace App\Models\Articles;

use App\Models\Files\Files;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleDetail extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'article_id',
        'description',
    ];

    protected $table = 'article_detail';

    public function files()
    {
        return $this->belongsToMany(Files::class, 'article_detail_files', 'detail_id', 'file_id')
            ->using(new class extends Pivot {
                use HasUuids, SoftDeletes;
                public function scopeFilter($query, $request){

                }
            })
            ->withTimestamps();
    }

    public function scopeFilter($query, $request){

    }
}
