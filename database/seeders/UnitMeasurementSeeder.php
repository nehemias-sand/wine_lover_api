<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitMeasurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('unit_measurement')->insert([
            [
                'name' => 'mililitro',
                'abbreviation' => 'ml'
            ],
            [
                'name' => 'litro',
                'abbreviation' => 'l'
            ],
            [
                'name' => 'galon',
                'abbreviation' => 'gal'
            ]
        ]);

        DB::statement('ALTER SEQUENCE unit_measurement_id_seq RESTART WITH 4');
    }
}
