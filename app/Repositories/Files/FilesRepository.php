<?php

namespace App\Repositories\Files;

use App\Models\Files\Files;
use App\Repositories\AbstractBaseRepository;


class FilesRepository extends AbstractBaseRepository
{
    public function model()
    {
        return Files::class;
    }

}
