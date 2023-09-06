<?php


namespace App\Repositories\Users;


use App\Models\Users\UsersEvents;
use App\Repositories\AbstractBaseRepository;

class UsersEventsRepository extends AbstractBaseRepository
{
    public function model()
    {
        return UsersEvents::class;
    }
}
