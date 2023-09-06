<?php

namespace Database\Seeders;

use App\Models\FilesType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
