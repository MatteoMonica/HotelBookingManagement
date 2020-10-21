<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('login')->insert([
            'username' => 'admin@admin.it',
            'password' => '$2b$10$RSQOIN3PLGFkt2eC7TFYtejjN0SrvArm6nd/6frrlWiu8SpzNXbDG',
            'role' => 1
        ]);
    }
}
