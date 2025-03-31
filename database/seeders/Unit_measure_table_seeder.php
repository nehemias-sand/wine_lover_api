<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Unit_measure_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('unit_measurement')->insert([
            [
                'name'=>'ml'
            ],
            [
                'name'=>'l'
            ],
            [
                'name'=>'gal'
            ]
        ]);
  
        DB::statement('ALTER SEQUENCE unit_measurement_id_seq RESTART WITH 4');
    }
}
