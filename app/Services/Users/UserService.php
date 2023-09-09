<?php

namespace App\Services\Users;

use App\Repositories\Users\UsersEventsRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Users\{
    UsersRepository,
    UsersPivotEventsRepository
};
use App\Services\AbstractBaseService;
use Illuminate\Validation\ValidationException;


class UserService extends AbstractBaseService
{
    private $user_repository;
    private $users_events_repository;

    private $users_pivot_events_repository;

    public function __construct(
        UsersRepository            $user_repository,
        UsersEventsRepository      $users_events_repository,
        UsersPivotEventsRepository $users_pivot_events_repository
    )
    {
        parent::__construct();
        $this->user_repository = $user_repository;
        $this->users_events_repository = $users_events_repository;
        $this->users_pivot_events_repository = $users_pivot_events_repository;
    }

    public function repository()
    {
        return UsersRepository::class;
    }

    public function insert($input)
    {
        $function = $this->user_repository->insertRepository([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'password' => $input['password'],
            'email' => $input['email'],
            'last_login' => date('Y-m-d H:i:s'),
        ]);

        return $function;
    }

    public function createToken($input)
    {
        Auth::setUser($input);
        $auth = Auth::authenticate();

        $tokenResult = $auth->createToken('UserRegisterRequest Client ID' . $auth->id);
        $token = $tokenResult->token;
        $token->save();

        $response = [
            'token' => $tokenResult->accessToken,
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ];

        return $response;
    }

    public function checkAuth($input)
    {
        $function = $this->user_repository->showRepository([
            'where' => [
                ['email', $input['email']],
                ['password', md5($input['password'])],
                ['status_id', 1]#Active
            ]
        ]);

        if (empty($function)) {
            throw ValidationException::withMessages(['The username or password is incorrect.']);
        }

        return $function;
    }

    public function revokeToken(Request $request)
    {
        $request->user()->token()->revoke();
    }

    public function updateLastLogin($input)
    {
        $this->user_repository->updateRepository([
            'where' => [['id', $input['id']]],
            'input' => ['last_login' => date('Y-m-d H:i:s')]
        ]);
    }


    public function showEventById($input)
    {
        return $this->users_events_repository->findRepository(['id' => $input['event_id']]);
    }

    public function updateEvent($input)
    {
        try {
            $this->findService(['id' => $input['user_id']]);
        } catch (\Exception $exception) {
            throw ValidationException::withMessages(['User not found']);
        }

        $this->users_pivot_events_repository->updateRepository([
            'where' => [['id', $input['event_id']]],
            'input' => ['status_id' => $input['status_id']]
        ]);
    }

    public function insertEvent($input)
    {
        return $this->users_pivot_events_repository->insertRepository($input);
    }

    public function list(Request $request)
    {
        return $this->user_repository->list($request);
    }

    public function showEvent($input)
    {
        return $this->users_pivot_events_repository->showRepository($input);

    }
}
