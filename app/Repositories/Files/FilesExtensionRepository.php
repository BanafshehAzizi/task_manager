<?php

namespace App\Repositories\Files;

use App\Models\Files\FilesExtension;
use App\Repositories\AbstractBaseRepository;


class FilesExtensionRepository extends AbstractBaseRepository
{
    public function model()
    {
        return FilesExtension::class;
    }

}
