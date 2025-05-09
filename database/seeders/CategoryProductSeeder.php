<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_product')->insert([
            [
                'name' => 'Vino',
                'description' => 'Elegante y versátil, perfecto para realzar cualquier ocasión con su variedad de aromas y sabores.'
            ],
            [
                'name' => 'Licor',
                'description' => 'Bebida intensa y sofisticada, ideal para disfrutar sola o en cócteles.'
            ],
            [
                'name' => 'Muebles',
                'description' => 'Diseño y funcionalidad en armonía, pensado para aportar estilo a cualquier espacio.'
            ]
        ]);

        DB::statement('ALTER SEQUENCE category_product_id_seq RESTART WITH 4');
    }
}
