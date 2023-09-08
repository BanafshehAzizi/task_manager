<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    public function run()
    {
        $input = [
            ['name' => 'حداکثر مدت اعتبار تولید توکن فایل', 'key' => 'file.access.max', 'value' => '4320', 'user_id' => 1, 'type' => 'input'],
            ['name' => 'حداکثر تعدا کاراکتر خلاصه تسک', 'key' => 'article.summary.length.max', 'value' => '200', 'user_id' => 1, 'type' => 'input'],
        ];
        Settings::insert($input);
    }

}
