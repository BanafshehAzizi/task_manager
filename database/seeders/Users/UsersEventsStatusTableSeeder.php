<?php

namespace Database\Seeders\Users;

use App\Models\Users\UsersEventsStatus;
use Illuminate\Database\Seeder;

class UsersEventsStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            ['id' => 1, 'name' => 'In Progress'],
            ['id' => 2, 'name' => 'Success'],
            ['id' => 3, 'name' => 'Error'],
        ];
        UsersEventsStatus::insert($input);
    }
}
