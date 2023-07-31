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
                'name' => 'tangziweng',
                'email' => 'tang@gmail.com',
                'password' => bcrypt('tangtang'),
                'role' => 'staff',
            ],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'taikhorwin',
                'email' => 'tai@gmail.com',
                'password' => bcrypt('taitai'),
                'role' => 'lecturer',
            ],
        ]);
    }
}
