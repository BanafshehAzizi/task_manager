<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{

    protected $fillable = [
        'name', 'key', 'value', 'user_id',
    ];

    protected $table = 'settings';

    public function user()
    {
        return $this->belongsTo('App\Models\Users');
    }

}
