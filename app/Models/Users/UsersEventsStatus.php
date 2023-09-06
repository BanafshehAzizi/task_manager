<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersEventsStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $table = 'users_events_status';
}
