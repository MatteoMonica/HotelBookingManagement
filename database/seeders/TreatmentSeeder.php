<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TreatmentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('treatments')->insert([
            'descriptiontreatment' => 'Breakfast Only'
        ]);

        DB::table('treatments')->insert([
            'descriptiontreatment' => 'Room Only'
        ]);

        DB::table('treatments')->insert([
            'descriptiontreatment' => 'Other'
        ]);
    }
}
