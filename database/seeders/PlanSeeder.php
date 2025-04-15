<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('plan')->insert([
            [
                'name' => 'Mensual',
                'months' => 1,
                'description' => '1 mes'
            ],
            [
                'name' => 'Semestral',
                'months' => 6,
                'description' => '6 meses'
            ],
            [
                'name' => 'Anual',
                'months' => 12,
                'description' => '12 meses'
            ]
        ]);


        DB::statement('ALTER SEQUENCE plan_id_seq RESTART WITH 4');
    }
}
