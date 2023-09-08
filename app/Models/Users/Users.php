<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Users extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'last_login',
    ];

    protected $table = 'users';

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function events()
    {
        return $this->belongsToMany(UsersEvents::class, 'users_pivot_events', 'user_id', 'event_id')
            ->using(new class extends Pivot {
                use HasUuids;
            })
            ->withPivot('status_id')->withTimestamps();
    }

    public function scopeFilter($query, $request){

    }

}
