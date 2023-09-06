<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersPivotEvents extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['user_id', 'event_id', 'status_id'];

    protected $table = 'users_pivot_events';
}
