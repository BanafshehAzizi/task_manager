<?php


namespace App\Repositories\Users;


use App\Models\Users\UsersPivotEvents;
use App\Repositories\AbstractBaseRepository;

class UsersPivotEventsRepository extends AbstractBaseRepository
{
    public function model()
    {
        return UsersPivotEvents::class;
    }

    public function __construct()
    {
        parent::__construct();
    }

}
