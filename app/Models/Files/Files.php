<?php

namespace App\Models\Files;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'user_id',
        'type_id',
        'browser_id',
        'extension_id',
        'ip_address',
        'name',
        'size',
        'token',
        'token_expired_at',
        'verified_at',
    ];

    protected $table = 'files';
}
