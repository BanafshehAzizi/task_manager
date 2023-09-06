<?php

namespace Database\Seeders\Files;

use App\Models\Files\FilesType;
use Illuminate\Database\Seeder;

class FilesTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            ['id' => 1, 'name' => 'private'],
            ['id' => 2, 'name' => 'public']
        ];
        FilesType::insert($input);
    }
}
