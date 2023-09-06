<?php

namespace Database\Seeders\Articles;

use App\Models\Articles\ArticlesStatus;
use Illuminate\Database\Seeder;

class ArticlesStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            ['id' => 1, 'name' => 'TO DO'],
            ['id' => 2, 'name' => 'In Progress'],
            ['id' => 3, 'name' => 'Done'],
        ];
        ArticlesStatus::insert($input);
    }
}
