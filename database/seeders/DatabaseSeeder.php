<?php

namespace Database\Seeders;

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
