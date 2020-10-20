<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StatusReservationSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statusreservation')->insert([
            'descriptionbookingstatus' => 'Pending approval'
        ]);

        DB::table('statusreservation')->insert([
            'descriptionbookingstatus' => 'Confirmed'
        ]);

        DB::table('statusreservation')->insert([
            'descriptionbookingstatus' => 'Rejected'
        ]);
    }
}
