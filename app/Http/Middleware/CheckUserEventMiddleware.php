<?php

namespace App\Http\Middleware;

use App\Models\Users\Users;
use App\Services\Users\UserService;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CheckUserEventMiddleware
{
    protected $user_service;

    public function __construct(UserService $user_service)
    {
        $this->user_service = $user_service;
    }

    public function handle(Request $request, Closure $next, $event_id)
    {
        $user_id = Auth::id();
        $this->validateChangeState([
            'user_id' => $user_id,
            'event_id' => $event_id
        ]);

        $pivot_id = $this->user_service->insertEvent([
            'user_id' => $user_id,
            'event_id' => $event_id,
            'status_id' => 1
        ])->id;

        try {
            $response = $next($request);
        } catch (\Exception $exception) {
            $this->user_service->updateEvent([
                'event_id' => $pivot_id,
                'status_id' => 3,#error
                'user_id' => $user_id
            ]);
            throw $exception;
        }

        if ($response->exception instanceof Exception) {
            $this->user_service->updateEvent([
                'event_id' => $pivot_id,
                'status_id' => 3,#error
                'user_id' => $user_id
            ]);
            throw $response->exception;
        }

        $this->user_service->updateEvent([
            'event_id' => $pivot_id,
            'status_id' => 2,#successful
            'user_id' => $user_id
        ]);

        return $response;
    }

    private function validateChangeState($input)
    {
        $user = Users::find($input['user_id']);
        if (empty($user->events->toArray())) {
            return null;
        }
//        $user_event = $user->events()->where('event_id', $input['event_id'])->orderBy('pivot_created_at', 'desc')->orderBy('status_id', 'asc')->first();
        $event = $this->user_service->showEvent([
            'where' => [
                ['status_id', 1],
                ['user_id', $input['user_id']],
                ['event_id', $input['event_id']],
            ]
        ]);
        if (!empty($user_event) && !empty($event)) {#In Progress
            throw ValidationException::withMessages(['The request is repetitive.']);
        }
    }
}
