<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'TangZiWeng',
                'email' => 'staff@gmail.com',
                'password' => bcrypt('staff'),
                'role' => 'staff',
            ],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'TaiKhorWin',
                'email' => 'lecturer1@gmail.com',
                'password' => bcrypt('lecturer'),
                'role' => 'lecturer',
            ],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'TnekShiinWei',
                'email' => 'lecturer2@gmail.com',
                'password' => bcrypt('lecturer'),
                'role' => 'lecturer',
            ],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'YanHaoYang',
                'email' => 'lecturer3@gmail.com',
                'password' => bcrypt('lecturer'),
                'role' => 'lecturer',
            ],
        ]);

    }
}
