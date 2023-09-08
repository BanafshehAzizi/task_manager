<?php

namespace App\Services\ArticleService;

use App\Repositories\Articles\ArticleDetailRepository;
use App\Repositories\Articles\ArticlesPriorityRepository;
use App\Repositories\Articles\ArticlesRepository;
use App\Repositories\Articles\ArticlesStatusRepository;
use App\Services\AbstractBaseService;
use App\Services\Files\FileService;
use Illuminate\Http\Request;

class ArticleService extends AbstractBaseService
{
    private $article_repository;
    private $article_detail_repository;
    private $article_status_repository;
    private $article_priority_repository;
    private $file_service;

    public function __construct(
        ArticlesRepository $articles_repository,
        ArticleDetailRepository $article_detail_repository,
        ArticlesStatusRepository $article_status_repository,
        ArticlesPriorityRepository $article_priority_repository,
        FileService $file_service,
    )
    {
        $this->article_repository = $articles_repository;
        $this->article_detail_repository = $article_detail_repository;
        $this->article_status_repository = $article_status_repository;
        $this->article_priority_repository = $article_priority_repository;
        $this->file_service = $file_service;
    }

    public function list(Request $request)
    {
        return $this->article_repository->list($request);
    }

    public function show(Request $request)
    {
        return $this->article_repository->show($request);
    }

    public function repository()
    {
        return ArticlesRepository::class;
    }
}
