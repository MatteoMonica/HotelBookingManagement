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
            'name' => 'Admin',
            'surname' => 'Admin',
            'username' => 'admin@example.com',
            'password' => '$2b$10$X3RWvxNjTlpQF.QtWOe3ve1HRY8s0PNci3vaTt.KD7t70NECzjsLW',
            'role' => 1
        ]);

        DB::table('login')->insert([
            'name' => 'User',
            'surname' => 'User',
            'username' => 'user@example.com',
            'password' => '$2b$10$X3RWvxNjTlpQF.QtWOe3ve1HRY8s0PNci3vaTt.KD7t70NECzjsLW',
            'role' => 2
        ]);
    }
}
