<?php


namespace App\Repositories\Articles;


use App\Models\Articles\ArticlesPriority;
use App\Repositories\AbstractBaseRepository;
use Illuminate\Http\Request;

class ArticlesPriorityRepository extends AbstractBaseRepository
{
    public function model()
    {
        return ArticlesPriority::class;
    }

    public function list(Request $request)
    {
        $priority_select = ['id', 'name'];

        $priority_order_by_column = $request->order_by_column ?: 'id';
        $priority_order_by_direction = $request->order_by_direction ?: 'desc';

        $priority_offset = $request->offset ?: 0;
        $priority_limit = $request->limit ?: 10;

        $function = $this->model::filter($request)
        ->orderBy($priority_order_by_column, $priority_order_by_direction)
            ->offset($priority_offset)
            ->limit($priority_limit)
            ->get($priority_select);
        return $function;
    }
}
