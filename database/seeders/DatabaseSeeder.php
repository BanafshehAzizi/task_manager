<?php

namespace Database\Seeders;

use Database\Seeders\Articles\ArticlesPriorityTableSeeder;
use Database\Seeders\Articles\ArticlesStatusTableSeeder;
use Database\Seeders\Files\BrowsersTableSeeder;
use Database\Seeders\Files\FilesExtensionTableSeeder;
use Database\Seeders\Files\FilesTypeTableSeeder;
use Database\Seeders\Users\UsersEventsStatusTableSeeder;
use Database\Seeders\Users\UsersEventsTableSeeder;
use Database\Seeders\Users\UsersRoleTableSeeder;
use Database\Seeders\Users\UsersStatusTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ArticlesPriorityTableSeeder::class,
            ArticlesStatusTableSeeder::class,
            BrowsersTableSeeder::class,
            FilesExtensionTableSeeder::class,
            FilesTypeTableSeeder::class,
            UsersStatusTableSeeder::class,
            UsersRoleTableSeeder::class,
            UsersEventsStatusTableSeeder::class,
            UsersEventsTableSeeder::class
        ]);
    }
}
