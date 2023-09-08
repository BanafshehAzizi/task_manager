<?php

namespace App\Repositories\Users;

use App\Models\Users\Users;
use App\Repositories\AbstractBaseRepository;
use Illuminate\Http\Request;

class UsersRepository extends AbstractBaseRepository
{
    public function model()
    {
        return Users::class;
    }

    public function list(Request $request)
    {
        $user_select = [
            'id',
            'first_name',
            'last_name',
        ];

        $user_order_by_column = $request->order_by_column ?: 'created_at';
        $user_order_by_direction = $request->order_by_direction ?: 'desc';

        $user_offset = $request->offset ?: 0;
        $user_limit = $request->limit ?: 10;

        $request->merge(['status_id' => 1]);#Active

        $function = $this->model::filter($request)
            ->orderBy($user_order_by_column, $user_order_by_direction);

        if (!empty($request->pagination)) {
            $function = $function->paginate($request->pagination, $user_select)->withPath(null);;
            return $function;
        }

        $function = $function
            ->offset($user_offset)
            ->limit($user_limit)
            ->get($user_select);
        return $function;
    }
}
