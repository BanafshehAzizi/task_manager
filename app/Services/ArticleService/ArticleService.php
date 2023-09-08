<?php

namespace App\Services\ArticleService;

use App\Repositories\Articles\ArticleDetailRepository;
use App\Repositories\Articles\ArticlesPriorityRepository;
use App\Repositories\Articles\ArticlesRepository;
use App\Repositories\Articles\ArticlesStatusRepository;
use App\Services\AbstractBaseService;
use App\Services\Files\FileService;
use App\Services\SettingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ArticleService extends AbstractBaseService
{
    private $article_repository;
    private $article_detail_repository;
    private $article_status_repository;
    private $article_priority_repository;
    private $file_service;
    private $setting_service;

    public function __construct(
        ArticlesRepository $articles_repository,
        ArticleDetailRepository $article_detail_repository,
        ArticlesStatusRepository $article_status_repository,
        ArticlesPriorityRepository $article_priority_repository,
        FileService $file_service,
        SettingService $setting_service
    )
    {
        $this->article_repository = $articles_repository;
        $this->article_detail_repository = $article_detail_repository;
        $this->article_status_repository = $article_status_repository;
        $this->article_priority_repository = $article_priority_repository;
        $this->file_service = $file_service;
        $this->setting_service = $setting_service;
    }

    public function list(Request $request)
    {
        return $this->article_repository->list($request);
    }

    public function show(Request $request)
    {
        return $this->article_repository->show($request);
    }

    public function insert($input)
    {
        $function = DB::transaction(function () use ($input) {
            $max_article_summary_length = $this->setting_service->showWithFailService(['where' => ['key' => 'article.summary.length.max']])->value;

            $function = $this->article_repository->insertRepository([
                'title' => $input['title'],
                'priority_id' => $input['priority_id'],
                'status_id' => 1,#TO DO
                'author_id' => $input['author_id'],
                'summary' => substr($input['description'], 0, $max_article_summary_length),
                'published_at' => $input['published_at']
            ]);

            $detail = $this->article_detail_repository->insertRepository([
                'article_id' => $function->id,
                'description' => $input['description'],
            ]);

            if (!empty($input['attachments'])) {
                foreach ($input['attachments'] as $attachment) {
                    try {
                        $file = $this->file_service->showWithFailService([
                            'where' => [
                                ['token', $attachment],
                                ['user_id', $input['author_id']]
                            ]
                        ]);
                    } catch (\Exception $exception) {
                        throw ValidationException::withMessages([__('messages.public.error.not_exist', ['pattern' => __('validation.attributes.file')])]);
                    }
                    $detail->files()->attach($file->id);
                }
            }

            return $function;
        });

        return $function;
    }

    public function repository()
    {
        return ArticlesRepository::class;
    }

    public function delete($input)
    {
        $this->article_repository->deleteRepository([
            'where' => [['id', $input['article_id']], ['author_id', $input['author_id']]]
        ]);
    }

    public function update($input)
    {
        DB::transaction(function () use ($input){
            $input_temp = $input;
            unset($input_temp['article_id'], $input_temp['description']);
            $this->article_repository->updateRepository([
                'where' => [['id', $input['article_id']]],
                'input' => $input_temp
            ]);

            if (!empty($input['description'])) {
                $this->article_detail_repository->updateRepository([
                    'where' => [['article_id', $input['article_id']]],
                    'input' => ['description' => $input['description']]
                ]);
            }
        });

    }
}
