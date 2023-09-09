<?php

namespace App\Http\Controllers\Api\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\ArticleDeleteRequest;
use App\Http\Requests\Articles\ArticleFileDeleteRequest;
use App\Http\Requests\Articles\ArticleFileInsertRequest;
use App\Http\Requests\Articles\ArticleInsertRequest;
use App\Http\Requests\Articles\ArticleListRequest;
use App\Http\Requests\Articles\ArticleUpdateRequest;
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
            'priority_id' => $request->priority_id ?: 3,
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

    public function update(ArticleUpdateRequest $request)
    {
        $input = [
            'article_id' => $request->article_id,
            'title' => $request->title,
            'priority_id' => $request->priority_id,
            'author_id' => $request->autho_id,
            'description' => $request->description,
            'published_at' => $request->published_at
        ];
        $input = array_intersect_key($input, $request->toArray());
        $this->article_service->update($input);
        return $this->showResponse();
    }

    public function insertFiles(ArticleFileInsertRequest $request)
    {
        $input = [
            'article_id' => $request->article_id,
            'user_id' => Auth::id(),
            'browser_name' => $request->browser_name,
            'ip_address' => $request->ip_address,
            'files' => $request->file('files')
        ];
        $this->article_service->insertFiles($input);
        return $this->showResponse();
    }

    public function deleteFile(ArticleFileDeleteRequest $request)
    {
        $input = [
            'article_id' => $request->article_id,
            'token' => $request->token,
            'user_id' => Auth::id()
        ];
        $this->article_service->deleteFile($input);
        return $this->showResponse();
    }

}
