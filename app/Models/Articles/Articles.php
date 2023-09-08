<?php

namespace App\Models\Articles;

use App\Models\Users\Users;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articles extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'title',
        'summary',
        'author_id',
        'status_id',
        'priority_id',
        'published_at'
    ];

    protected $table = 'articles';

    public function priority()
    {
        return $this->belongsTo(ArticlesPriority::class, 'priority_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(ArticlesStatus::class, 'status_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(Users::class, 'user_id', 'id');
    }

    public function scopeFilter($query, $request)
    {
        $query->when($request->article_id ?? false,
            fn($query, $request) => $query->where('articles.id', $request)
        );

        $query->when($request->author_id ?? false,
            fn($query, $request) => $query->where('author_id', $request)
        );

        $query->when($request->priority_id ?? false,
            fn($query, $request) => $query->where('priority_id', $request)
        );

        $query->when($request->status_id ?? false,
            fn($query, $request) => $query->where('status_id', $request)
        );

        $query->when($request->created_at ?? false,
            fn($query, $request) => $query->where('created_at', '>=', $request)
        );

        $query->when($request->updated_at ?? false,
            fn($query, $request) => $query->where('updated_at', '>=', $request)
        );
    }

    public function scopeWithHasPriority($query, $select, $request)
    {
        $priority_callback = function ($query) use ($select, $request) {
            $query->select($select);
            $query->filter($request);
        };

        $query->with(['priority' => $priority_callback]);

        if (!empty($request))
            $query->whereHas('priority', $priority_callback);
    }

    public function scopeWithHasStatus($query, $select, $request)
    {
        $status_callback = function ($query) use ($select, $request) {
            $query->select($select);
            $query->filter($request);
        };

        $query->with(['status' => $status_callback]);

        if (!empty($request))
            $query->whereHas('status', $status_callback);
    }

    public function scopeWithHasDetail($query, $select, $request)
    {
        $detail_callback = function ($query) use ($select, $request) {
            $query->select($select);
            $query->filter($request);
        };

        $query->with(['detail' => $detail_callback]);

        if (!empty($request))
            $query->whereHas('detail', $detail_callback);
    }

    public function scopeWithHasAuthor($query, $select, $request)
    {
        $author_callback = function ($query) use ($select, $request) {
            $query->select($select);
            $query->filter($request);
        };

        $query->with(['author' => $author_callback]);

        if (!empty($request))
            $query->whereHas('author', $author_callback);
    }
}
