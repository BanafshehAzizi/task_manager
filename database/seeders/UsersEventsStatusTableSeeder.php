<?php

namespace Database\Seeders;

use App\Models\UsersEventsStatus;
use Illuminate\Database\Seeder;

class UsersEventsStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            ['id' => 1, 'name' => 'Not Done'],
            ['id' => 2, 'name' => 'Success'],
            ['id' => 3, 'name' => 'Error'],
        ];
        UsersEventsStatus::insert($input);
    }
}
