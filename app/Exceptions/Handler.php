<?php

namespace App\Exceptions;

use App\Traits\ResponseTrait;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ResponseTrait;

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {

        });
    }

    public function render($request, Throwable $exception)
    {
//        dd($exception);
        if ($exception instanceof AuthenticationException) {
            $input = [
                'status' => 'error',
                'message' => 'Token was not found.',
                'response' => []
            ];
            return $this->showResponse($input, 401);
        }

        if ($exception instanceof QueryException) {
            $message = 'Internal server error.';
            if($exception->errorInfo[1] == 1062){
                preg_match('/Duplicate entry \'(.*)\' for key \'(.*?)\'/', $exception->getMessage(), $matches);
                $message = $matches[2].' should not be repetitive.';
            }

            $input = [
                'status' => 'error',
                'message' => $message,
                'response' => [
                    'exception' => $exception->errorInfo
                ]
            ];
            return $this->showResponse($input, 500);
        }

        if ($exception instanceof ModelNotFoundException) {
            $input = [
                'status' => 'error',
                'message' => 'Not found',
                'response' => [
                    'exception' => $exception
                ]
            ];
            return $this->showResponse($input, 404);
        }

        if ($exception instanceof ValidationException) {
            $input = [
                'status' => 'error',
                'message' => 'The input data is invalid.',
                'response' => [
                    'validation' => $exception->errors()
                ]
            ];
            return $this->showResponse($input, 422);
        }

        if ($exception instanceof AccessDeniedException) {
            $input = [
                'status' => 'error',
                'message' => 'You do not have the required access.',
                'response' => []
            ];
            return $this->showResponse($input, 403);
        }

        $input = [
            'status' => 'error',
            'message' => 'Your request encountered an error. Please contact the technical support unit.',
            'response' => [
                'exception' => [
                    'message' => $exception->getMessage(),
                    'trace' => $exception->getTrace()
                ]
            ]
        ];
        return $this->showResponse($input, 500);
    }
}
