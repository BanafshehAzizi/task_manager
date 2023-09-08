<?php

namespace App\Repositories\Articles;

use App\Models\Articles\Articles;
use App\Repositories\AbstractBaseRepository;
use Illuminate\Http\Request;


class ArticlesRepository extends AbstractBaseRepository
{
    public function model()
    {
        return Articles::class;
    }

    public function list(Request $request)
    {
        $article_select = [
            'id',
            'refer_id',
            'title',
            'priority_id',
            'status_id',
            'created_at',
            'updated_at',
            'author_id',
            'summary'
        ];

        $priority_select = ['id', 'name'];
        $status_select = ['id', 'name'];
        $author_select = ['id', 'first_name', 'last_name'];

        $article_order_by_column = $request->order_by_column ?: 'created_at';
        $article_order_by_direction = $request->order_by_direction ?: 'desc';

        $article_offset = $request->offset ?: 0;
        $article_limit = $request->limit ?: 10;

        $function = $this->model::withHasPriority($priority_select, $request->priority ?? null)
            ->withHasStatus($status_select, $request->status ?? null)
            ->withHasAuthor($author_select, $request->author ?? null)
            ->filter($request)
            ->orderBy($article_order_by_column, $article_order_by_direction);

        if (!empty($request->pagination)) {
            $function = $function->paginate($request->pagination, $article_select)->withPath(null);;
            return $function;
        }

        $function = $function
            ->offset($article_offset)
            ->limit($article_limit)
            ->get($article_select);
        return $function;
    }

    public function show(Request $request)
    {
        $article_select = [
            'id',
            'refer_id',
            'title',
            'priority_id',
            'status_id',
            'created_at',
            'updated_at',
            'author_id',
            'summary'
        ];

        $priority_select = ['id', 'name'];
        $status_select = ['id', 'name'];
        $author_select = ['id', 'first_name', 'last_name'];
        $detail_select = ['id', 'content'];

        $article_order_by_column = $request->order_by_column ?: 'created_at';
        $article_order_by_direction = $request->order_by_direction ?: 'desc';

        $article_offset = $request->offset ?: 0;
        $article_limit = $request->limit ?: 10;

        $function = $this->model::withHasPriority($priority_select, $request->priority ?? null)
            ->withHasStatus($status_select, $request->status ?? null)
            ->withHasAuthor($author_select, $request->author ?? null)
            ->withHasDetail($detail_select, $request->detail ?? null)
            ->filter($request)
            ->orderBy($article_order_by_column, $article_order_by_direction);

        if (!empty($request->pagination)) {
            $function = $function->paginate($request->pagination, $article_select)->withPath(null);;
            return $function;
        }

        $function = $function
            ->offset($article_offset)
            ->limit($article_limit)
            ->get($article_select);
        return $function;
    }

}
