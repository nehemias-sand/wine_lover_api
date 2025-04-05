<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QualitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quality_product')->insert([
            [
                'name' => 'Standard',
                'description' => 'Vinos accesibles y equilibrados, perfectos para el día a día.'
            ],
            [
                'name' => 'Premiumn',
                'description' => 'Mayor complejidad y elegancia, ideales para paladares exigentes.'
            ],
            [
                'name' => 'Deluxe',
                'description' => 'Exclusivos y sofisticados, creados para momentos especiales.'
            ]
        ]);

        
        DB::statement('ALTER SEQUENCE quality_product_id_seq RESTART WITH 4');
    }
}
