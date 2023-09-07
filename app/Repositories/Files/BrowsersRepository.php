<?php

namespace App\Repositories\Files;

use App\Models\Files\Browsers;
use App\Repositories\AbstractBaseRepository;

class BrowsersRepository extends AbstractBaseRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function model()
    {
        return Browsers::class;
    }

}
