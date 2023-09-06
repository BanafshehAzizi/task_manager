<?php

namespace Database\Seeders;

use App\Models\UsersStatus;
use Illuminate\Database\Seeder;

class UsersStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            ['id' => 1, 'name' => 'Active'],
            ['id' => 2, 'name' => 'Deactive']
        ];
        UsersStatus::insert($input);
    }
}
