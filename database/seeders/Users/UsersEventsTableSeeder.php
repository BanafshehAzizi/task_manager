<?php

namespace Database\Seeders\Users;

use App\Models\Users\UsersEvents;
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
            ['id' => 2, 'name' => 'Upload File'],
        ];
        UsersEvents::insert($input);
    }
}
