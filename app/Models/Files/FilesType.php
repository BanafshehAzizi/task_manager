<?php

namespace App\Models\Files;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilesType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $table = 'files_type';
}
