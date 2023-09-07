<?php

namespace App\Repositories;

use App\Models\Settings;
use Illuminate\Http\Request;


class SettingsRepository extends AbstractBaseRepository
{
    public function model()
    {
        return Settings::class;
    }

}
