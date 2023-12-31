<?php

namespace App\Models\Files;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilesExtension extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $table = 'files_extension';
}
