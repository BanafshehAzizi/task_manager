<?php

namespace Database\Seeders\Articles;

use App\Models\Articles\ArticlesPriority;
use Illuminate\Database\Seeder;

class ArticlesPriorityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            ['id' => 1, 'name' => 'Highest'],
            ['id' => 2, 'name' => 'High'],
            ['id' => 3, 'name' => 'Medium'],
            ['id' => 4, 'name' => 'Low'],
            ['id' => 5, 'name' => 'Lowest'],
        ];
        ArticlesPriority::insert($input);

    }
}
