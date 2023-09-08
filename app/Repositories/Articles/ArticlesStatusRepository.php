<?php


namespace App\Repositories\Articles;


use App\Models\Articles\ArticlesStatus;
use App\Repositories\AbstractBaseRepository;
use Illuminate\Http\Request;

class ArticlesStatusRepository extends AbstractBaseRepository
{
    public function model()
    {
        return ArticlesStatus::class;
    }

    public function list(Request $request)
    {
        $status_select = ['id', 'name'];

        $status_order_by_column = $request->order_by_column ?: 'id';
        $status_order_by_direction = $request->order_by_direction ?: 'desc';

        $status_offset = $request->offset ?: 0;
        $status_limit = $request->limit ?: 10;

        $function = $this->model::filter($request)
            ->orderBy($status_order_by_column, $status_order_by_direction)
            ->offset($status_offset)
            ->limit($status_limit)
            ->get($status_select);
        return $function;
    }
}
