<?php

namespace App\Repositories\Articles;

use App\Models\Articles\ArticleDetail;
use App\Repositories\AbstractBaseRepository;

class ArticleDetailRepository extends AbstractBaseRepository
{

    public function model()
    {
        return ArticleDetail::class;
    }

}
