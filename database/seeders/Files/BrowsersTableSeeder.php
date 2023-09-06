<?php

namespace Database\Seeders\Files;

use App\Models\Files\Browsers;
use Illuminate\Database\Seeder;

class BrowsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            ['id' => '1', 'name' => 'Firefox'],
            ['id' => '2', 'name' => 'Chrome']
        ];
        Browsers::insert($input);
    }
}
