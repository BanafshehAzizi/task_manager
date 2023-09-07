<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Http\Requests\Files\FileDeleteRequest;
use App\Http\Requests\Files\FileInsertRequest;
use App\Services\Files\FileService;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    use ResponseTrait;

    private $file_service;

    public function __construct(FileService $file_service)
    {
        $this->file_service = $file_service;
    }
    public function insert(FileInsertRequest $request)
    {
        $input = [
            'user_id' => Auth::id(),
            'browser_name' => $request->browser_name,
            'ip_address' => $request->ip_address
        ];
        $response = [];
        foreach ($request->file('files') as $file) {
            $input['file_type'] = 'private';
            $input['file'] = $file;
            $function = $this->file_service->insert($input);
            $response[] = [
                'token' => $function->token,
//                'format' => $function->extension->name,
//                'icon_path' => $function->extension->icon_path
            ];
        }

        return $this->showResponse($response);
    }

    public function delete(FileDeleteRequest $request)
    {
        $input = [
            'token' => $request->token,
            'user_id' => Auth::id()
        ];
        $this->file_service->delete($input);
        return $this->showResponse();
    }
}
