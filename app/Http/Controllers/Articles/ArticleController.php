<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\ArticleListRequest;
use App\Services\ArticleService\ArticleService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use ResponseTrait;

    private $article_service;

    public function __construct(ArticleService $article_service)
    {
        $this->article_service = $article_service;
    }
    public function list(ArticleListRequest $request)
    {
        $function = $this->article_service->list($request);
        return $this->showResponse($function);
    }

    public function show(Request $request)
    {
        $function = $this->article_service->show($request);
        return $this->showResponse($function);
    }

}
