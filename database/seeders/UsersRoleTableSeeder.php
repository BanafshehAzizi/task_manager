<?php

namespace Database\Seeders;

use App\Models\UsersRole;
use Illuminate\Database\Seeder;

class UsersRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            ['id' => 1, 'name' => 'user'],
            ['id' => 2, 'name' => 'admin']
        ];
        UsersRole::insert($input);
    }
}
