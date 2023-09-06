<?php

namespace Database\Seeders;

use App\Models\UsersEvents;
use Illuminate\Database\Seeder;

class UsersEventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            ['id' => 1, 'name' => 'Create Article'],
        ];
        UsersEvents::insert($input);
    }
}
