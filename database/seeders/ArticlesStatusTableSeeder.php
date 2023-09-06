<?php

namespace Database\Seeders;

use App\Models\ArticlesPriority;
use App\Models\ArticlesStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
