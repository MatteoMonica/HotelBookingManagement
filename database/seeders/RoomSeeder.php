<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RoomSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            'roomname' => 'Camera 1',
            'roomcapacity' => 1,
            'roomcostpernight' => 10.50
        ]);

        DB::table('rooms')->insert([
            'roomname' => 'Camera 2',
            'roomcapacity' => 2,
            'roomcostpernight' => 20.50
        ]);

        DB::table('rooms')->insert([
            'roomname' => 'Camera 3',
            'roomcapacity' => 3,
            'roomcostpernight' => 30.50
        ]);

        DB::table('rooms')->insert([
            'roomname' => 'Camera 4',
            'roomcapacity' => 4,
            'roomcostpernight' => 40.50
        ]);
    }
}
