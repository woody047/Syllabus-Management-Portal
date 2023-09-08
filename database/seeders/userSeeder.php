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
                'name' => 'Tang Zi Weng',
                'email' => 'tang@gmail.com',
                'password' => bcrypt('tangtang'),
                'role' => 'staff',
            ],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'Tai Khor Win',
                'email' => 'tai@gmail.com',
                'password' => bcrypt('taitai'),
                'role' => 'lecturer',
            ],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'Tnek Shiin Wei',
                'email' => 'tnek@gmail.com',
                'password' => bcrypt('tnektnek'),
                'role' => 'lecturer',
            ],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'Yan Hao Yang',
                'email' => 'yan@gmail.com',
                'password' => bcrypt('yanyan'),
                'role' => 'lecturer',
            ],
        ]);

    }
}
