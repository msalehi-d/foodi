<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
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
                'name' => 'محمد صالحی',
                'email' => 'admin@yahoo.com',
                'role' => config('constants.roles.admin'),
                'password' => bcrypt('123'),
            ],
            [
                'name' => 'رضا حسنی',
                'email' => 'user@yahoo.com',
                'role' =>  config('constants.roles.customer'),
                'password' => bcrypt('123'),
            ],
        ]);
    }
}
