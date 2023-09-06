<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        //
    ];

    public function boot(): void
    {
        Passport::personalAccessTokensExpireIn(now()->addDay());
        Passport::tokensExpireIn(now()->addDay());
    }
}
