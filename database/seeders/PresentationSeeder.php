<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('presentation')->insert([
            ['amount' => 750, 'unit_measurement_id' => 1], // 750 ml
            ['amount' => 375, 'unit_measurement_id' => 1], // 375 ml
            ['amount' => 1.5, 'unit_measurement_id' => 2], // 1.5 litros
            ['amount' => 3.0,  'unit_measurement_id' => 2], // 3 l
        ]);

        DB::statement('ALTER SEQUENCE presentation_id_seq RESTART WITH 5');
    }
}
