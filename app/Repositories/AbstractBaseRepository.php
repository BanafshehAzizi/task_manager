<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;


abstract class AbstractBaseRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->model());
    }

    abstract public function model();

    public function makeModelRepository()
    {
        $model = app($this->model());
        return $this->model = $model;
    }
    public function listRepository($input)
    {
        $input['order_by_column'] ??= 'id';
        $input['order_by_direction'] ??= 'desc';
        $input['where'] ??= [];
        $input['columns'] ??= ['*'];
        $input['where_not_in'] ??= [];
        $input['where_in'] ??= [];
        $input['where_null'] ??= [];
        $input['where_not_null'] ??= [];
        $input['or_where'] ??= [];

        $function = $this->model->where($input['where']);
        if (!empty($input['where_not_in'])) {
            $function = $function->whereNotIn($input['where_not_in'][0], $input['where_not_in'][1]);
        }

        if (!empty($input['where_in'])) {
            foreach ($input['where_in'] as $where_in) {
                $function = $function->whereIn($where_in[0], $where_in[1]);
            }
        }

        if (!empty($input['or_where'])) {
            foreach ($input['or_where'] as $or_where) {
                $function = $function->orWhere($or_where);
            }
        }

        if (!empty($input['where_null'])) {
            $function = $function->whereNull($input['where_null']);
        }

        if (!empty($input['where_not_null'])) {
            $function = $function->whereNotNull($input['where_not_null']);
        }

        $function = $function->orderBy($input['order_by_column'], $input['order_by_direction'])
            ->get($input['columns']);

        return $function;
    }

    public function insertRepository($input)
    {
        return $this->model->create($input);
    }

    public function updateRepository($input)
    {
        $input['exception'] ??= true;
        $input['where'] ??= [];//
        $input['with_trashed'] ??= false;

        $function = $this->model->where($input['where']);
        if (!empty($input['where_in'])) {
            foreach ($input['where_in'] as $where_in) {
                $function = $function->whereIn($where_in[0], $where_in[1]);
            }
        }
        if ($input['with_trashed']) {
            $function = $function->withTrashed();
        }
        $function = $function->get();
        if ((!$function || count($function) == 0) && $input['exception']) {
            throw new ModelNotFoundException(__('messages.public.error.not_found'));
        }
        foreach ($function as $item) {
            $item->fill($input['input']);
            $item->save();
        }

        return $function;
    }

    public function destroyRepository($input)
    {
        return $this->model->destroy($input['id']);
    }

    public function deleteRepository($input)
    {
        if (!empty($input['where'])) {
            $function = $this->model->where($input['where'])->delete();
            return $function;
        }
        $input['id'] = (array)$input['id'];
        $function = $this->model->whereIn('id', $input['id'])->delete();
        return $function;
    }

    public function findRepository($input)
    {
        $input['columns'] ??= ['*'];
        return $this->model->findOrFail($input['id'], $input['columns']);
    }

    public function showWithFailRepository($input)
    {
        $input['columns'] ??= ['*'];
        $input['order_by_column'] ??= 'id';
        $input['order_by_direction'] ??= 'asc';
        $input['where_not_null'] ??= [];

        $function = $this->model->where($input['where'])
            ->select($input['columns']);

        if (!empty($input['where_not_null'])) {
            $function = $function->whereNotNull($input['where_not_null']);
        }

        $function = $function->orderBy($input['order_by_column'], $input['order_by_direction'])
            ->firstOrFail();

        return $function;
    }

    public function showRepository($input)
    {
        $input['order_by_column'] ??= 'id';
        $input['order_by_direction'] ??= 'desc';
        $input['where'] ??= [];
        $input['or_where'] ??= [];
        $input['where_not_null'] ??= [];


        $function = $this->model->where($input['where']);

        if (!empty($input['where_in'])) {
            foreach ($input['where_in'] as $where_in) {
                $function = $function->whereIn($where_in[0], $where_in[1]);
            }
        }

        if (!empty($input['or_where'])) {
            foreach ($input['or_where'] as $or_where) {
                $function = $function->orWhere($or_where[0], $or_where[1]);
            }
        }

        if (!empty($input['where_not_null'])) {
            $function = $function->whereNotNull($input['where_not_null']);
        }

        if (!empty($input['random']) && $input['random']) {
            $function = $function->inRandomOrder();
        }
        if (!empty($input['with_trashed']) && $input['with_trashed']) {
            $function = $function->withTrashed();
        }

        return $function
            ->orderBy($input['order_by_column'], $input['order_by_direction'])
            ->first();
    }

    public function setModelRepository(Model $model)
    {
        $this->model = $model;
    }

    public function getModelRepository()
    {
        return $this->model;
    }

    public function updateOrCreateRepository($input)
    {
        if (!empty($input['with_trashed']) && $input['with_trashed']) {
            return $this->model::withTrashed()->updateOrCreate($input['condition'], $input['input']);
        }

        return $this->model::updateOrCreate($input['condition'], $input['input']);
    }

}
