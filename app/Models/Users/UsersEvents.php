<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersEvents extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $table = 'users_events';
}
