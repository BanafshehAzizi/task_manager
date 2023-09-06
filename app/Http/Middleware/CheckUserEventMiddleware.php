<?php

namespace App\Http\Middleware;

use App\Models\Users\Users;
use App\Services\Users\UserService;
use Closure;
use Exception;
use Illuminate\Http\Request;
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
        $client_id = request()->client_id;
        $this->validateChangeState([
            'user_id' => request()->user_id,
            'event_id' => $event_id
        ]);

        $client = $this->user_service->findService(['id' => $client_id]);
        $event = $this->user_service->showEventById(['event_id' => $event_id]);
        $client->events()->attach($event, ['event_id' => $event_id, 'status_id' => 1]);
        $pivot_id = $client->events()->where('event_id', $event->id)->withPivot('id')->orderBy('pivot_created_at', 'desc')->orderBy('status_id', 'asc')->first()->pivot->id;

        try {
            $response = $next($request);
        } catch (\Exception $exception) {
            $this->user_service->updateEvent([
                'event_id' => $pivot_id,
                'status_id' => 3,#error
                'client_id' => $client_id
            ]);
            throw $exception;
        }

        if ($response->exception instanceof Exception) {
            $this->user_service->updateEvent([
                'event_id' => $pivot_id,
                'status_id' => 3,#error
                'client_id' => $client_id
            ]);
            throw $response->exception;
        }

        $this->user_service->updateEvent([
            'event_id' => $pivot_id,
            'status_id' => 2,#successful
            'client_id' => $client_id
        ]);

        return $response;
    }

    private function validateChangeState($input)
    {
        $client = Users::find($input['client_id']);
        if (empty($client->events->toArray())) {
            return null;
        }
        $user_event = $client->events()->where('event_id', $input['event_id'])->orderBy('pivot_created_at', 'desc')->orderBy('status_id', 'asc')->first();

        if (!empty($user_event) && $user_event->pivot->status_id == 1) {#In Progress
            throw ValidationException::withMessages([__('messages.public.error.repetitive_request')]);
        }
    }
}
