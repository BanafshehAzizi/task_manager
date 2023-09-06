<?php

namespace App\Repositories\Users;

use App\Models\Users\Users;
use App\Repositories\AbstractBaseRepository;

class UsersRepository extends AbstractBaseRepository
{
    public function model()
    {
        return Users::class;
    }
}
