<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\ArticleDeleteRequest;
use App\Http\Requests\Articles\ArticleInsertRequest;
use App\Http\Requests\Articles\ArticleListRequest;
use App\Services\ArticleService\ArticleService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function insert(ArticleInsertRequest $request)
    {
        $input = [
            'title' => $request->title,
            'priority_id' => $request->priority_id,
            'author_id' => Auth::id(),
            'description' => $request->description,
            'attachments' => $request->attachments,
            'browser_name' => $request->browser_name ?: null,
            'ip_address' => $request->ip_address ?: null,
            'published_at' => $request->published_at ?: date('Y-m-d H:i:s')
        ];
        $response = $this->article_service->insert($input);
        return $this->showResponse($response);
    }

    public function delete(ArticleDeleteRequest $request)
    {
        $input = [
            'article_id' => $request->article_id,
            'author_id' => Auth::id()
        ];
        $this->article_service->delete($input);
        return $this->showResponse();
    }

}
