<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('product_presentation')->insert([
             // Producto 1 al 10 – Vinos
            ['product_id' => 1, 'presentation_id' => 1, 'unit_price' => 90.00, 'stock' => 25],
            ['product_id' => 1, 'presentation_id' => 2, 'unit_price' => 150.00, 'stock' => 40],
            ['product_id' => 1, 'presentation_id' => 3, 'unit_price' => 280.00, 'stock' => 15],
            ['product_id' => 1, 'presentation_id' => 4, 'unit_price' => 530.00, 'stock' => 8],

            ['product_id' => 2, 'presentation_id' => 1, 'unit_price' => 85.00, 'stock' => 22],
            ['product_id' => 2, 'presentation_id' => 2, 'unit_price' => 140.00, 'stock' => 36],
            ['product_id' => 2, 'presentation_id' => 3, 'unit_price' => 265.00, 'stock' => 12],
            ['product_id' => 2, 'presentation_id' => 4, 'unit_price' => 500.00, 'stock' => 7],

            ['product_id' => 3, 'presentation_id' => 1, 'unit_price' => 80.00, 'stock' => 30],
            ['product_id' => 3, 'presentation_id' => 2, 'unit_price' => 130.00, 'stock' => 50],
            ['product_id' => 3, 'presentation_id' => 3, 'unit_price' => 240.00, 'stock' => 20],
            ['product_id' => 3, 'presentation_id' => 4, 'unit_price' => 470.00, 'stock' => 10],

            ['product_id' => 4, 'presentation_id' => 1, 'unit_price' => 40.00, 'stock' => 35],
            ['product_id' => 4, 'presentation_id' => 2, 'unit_price' => 70.00, 'stock' => 50],
            ['product_id' => 4, 'presentation_id' => 3, 'unit_price' => 130.00, 'stock' => 18],
            ['product_id' => 4, 'presentation_id' => 4, 'unit_price' => 240.00, 'stock' => 6],

            ['product_id' => 5, 'presentation_id' => 1, 'unit_price' => 45.00, 'stock' => 28],
            ['product_id' => 5, 'presentation_id' => 2, 'unit_price' => 75.00, 'stock' => 42],
            ['product_id' => 5, 'presentation_id' => 3, 'unit_price' => 140.00, 'stock' => 14],
            ['product_id' => 5, 'presentation_id' => 4, 'unit_price' => 260.00, 'stock' => 5],

            ['product_id' => 6, 'presentation_id' => 1, 'unit_price' => 600.00, 'stock' => 6],
            ['product_id' => 6, 'presentation_id' => 2, 'unit_price' => 950.00, 'stock' => 10],
            ['product_id' => 6, 'presentation_id' => 3, 'unit_price' => 1800.00, 'stock' => 3],
            ['product_id' => 6, 'presentation_id' => 4, 'unit_price' => 3500.00, 'stock' => 1],

            ['product_id' => 7, 'presentation_id' => 1, 'unit_price' => 18.00, 'stock' => 60],
            ['product_id' => 7, 'presentation_id' => 2, 'unit_price' => 30.00, 'stock' => 80],
            ['product_id' => 7, 'presentation_id' => 3, 'unit_price' => 55.00, 'stock' => 25],
            ['product_id' => 7, 'presentation_id' => 4, 'unit_price' => 105.00, 'stock' => 12],

            ['product_id' => 8, 'presentation_id' => 1, 'unit_price' => 35.00, 'stock' => 24],
            ['product_id' => 8, 'presentation_id' => 2, 'unit_price' => 58.00, 'stock' => 30],
            ['product_id' => 8, 'presentation_id' => 3, 'unit_price' => 110.00, 'stock' => 14],
            ['product_id' => 8, 'presentation_id' => 4, 'unit_price' => 210.00, 'stock' => 5],

            ['product_id' => 9, 'presentation_id' => 1, 'unit_price' => 42.00, 'stock' => 26],
            ['product_id' => 9, 'presentation_id' => 2, 'unit_price' => 70.00, 'stock' => 30],
            ['product_id' => 9, 'presentation_id' => 3, 'unit_price' => 130.00, 'stock' => 15],
            ['product_id' => 9, 'presentation_id' => 4, 'unit_price' => 250.00, 'stock' => 4],

            ['product_id' => 10, 'presentation_id' => 1, 'unit_price' => 22.00, 'stock' => 48],
            ['product_id' => 10, 'presentation_id' => 2, 'unit_price' => 36.00, 'stock' => 60],
            ['product_id' => 10, 'presentation_id' => 3, 'unit_price' => 70.00, 'stock' => 20],
            ['product_id' => 10, 'presentation_id' => 4, 'unit_price' => 130.00, 'stock' => 8],

            // Productos 11 al 20 – Licores
            ['product_id' => 11, 'presentation_id' => 1, 'unit_price' => 120.00, 'stock' => 20],
            ['product_id' => 11, 'presentation_id' => 2, 'unit_price' => 200.00, 'stock' => 18],
            ['product_id' => 11, 'presentation_id' => 3, 'unit_price' => 390.00, 'stock' => 6],
            ['product_id' => 11, 'presentation_id' => 4, 'unit_price' => 750.00, 'stock' => 2],

            ['product_id' => 12, 'presentation_id' => 1, 'unit_price' => 32.00, 'stock' => 50],
            ['product_id' => 12, 'presentation_id' => 2, 'unit_price' => 55.00, 'stock' => 60],
            ['product_id' => 12, 'presentation_id' => 3, 'unit_price' => 100.00, 'stock' => 18],
            ['product_id' => 12, 'presentation_id' => 4, 'unit_price' => 190.00, 'stock' => 6],

            ['product_id' => 13, 'presentation_id' => 1, 'unit_price' => 10.00, 'stock' => 70],
            ['product_id' => 13, 'presentation_id' => 2, 'unit_price' => 16.00, 'stock' => 90],
            ['product_id' => 13, 'presentation_id' => 3, 'unit_price' => 30.00, 'stock' => 35],
            ['product_id' => 13, 'presentation_id' => 4, 'unit_price' => 58.00, 'stock' => 12],

            ['product_id' => 14, 'presentation_id' => 1, 'unit_price' => 75.00, 'stock' => 30],
            ['product_id' => 14, 'presentation_id' => 2, 'unit_price' => 125.00, 'stock' => 40],
            ['product_id' => 14, 'presentation_id' => 3, 'unit_price' => 230.00, 'stock' => 14],
            ['product_id' => 14, 'presentation_id' => 4, 'unit_price' => 440.00, 'stock' => 5],

            ['product_id' => 15, 'presentation_id' => 1, 'unit_price' => 45.00, 'stock' => 33],
            ['product_id' => 15, 'presentation_id' => 2, 'unit_price' => 78.00, 'stock' => 48],
            ['product_id' => 15, 'presentation_id' => 3, 'unit_price' => 140.00, 'stock' => 18],
            ['product_id' => 15, 'presentation_id' => 4, 'unit_price' => 265.00, 'stock' => 6],

            ['product_id' => 16, 'presentation_id' => 1, 'unit_price' => 160.00, 'stock' => 20],
            ['product_id' => 16, 'presentation_id' => 2, 'unit_price' => 270.00, 'stock' => 25],
            ['product_id' => 16, 'presentation_id' => 3, 'unit_price' => 500.00, 'stock' => 8],
            ['product_id' => 16, 'presentation_id' => 4, 'unit_price' => 980.00, 'stock' => 2],

            ['product_id' => 17, 'presentation_id' => 1, 'unit_price' => 18.00, 'stock' => 60],
            ['product_id' => 17, 'presentation_id' => 2, 'unit_price' => 30.00, 'stock' => 65],
            ['product_id' => 17, 'presentation_id' => 3, 'unit_price' => 56.00, 'stock' => 28],
            ['product_id' => 17, 'presentation_id' => 4, 'unit_price' => 110.00, 'stock' => 9],

            ['product_id' => 18, 'presentation_id' => 1, 'unit_price' => 12.00, 'stock' => 70],
            ['product_id' => 18, 'presentation_id' => 2, 'unit_price' => 19.00, 'stock' => 80],
            ['product_id' => 18, 'presentation_id' => 3, 'unit_price' => 36.00, 'stock' => 30],
            ['product_id' => 18, 'presentation_id' => 4, 'unit_price' => 69.00, 'stock' => 12],

            ['product_id' => 19, 'presentation_id' => 1, 'unit_price' => 20.00, 'stock' => 60],
            ['product_id' => 19, 'presentation_id' => 2, 'unit_price' => 32.00, 'stock' => 50],
            ['product_id' => 19, 'presentation_id' => 3, 'unit_price' => 60.00, 'stock' => 22],
            ['product_id' => 19, 'presentation_id' => 4, 'unit_price' => 115.00, 'stock' => 7],

            ['product_id' => 20, 'presentation_id' => 1, 'unit_price' => 15.00, 'stock' => 75],
            ['product_id' => 20, 'presentation_id' => 2, 'unit_price' => 26.00, 'stock' => 68],
            ['product_id' => 20, 'presentation_id' => 3, 'unit_price' => 50.00, 'stock' => 20],
            ['product_id' => 20, 'presentation_id' => 4, 'unit_price' => 95.00, 'stock' => 8],
        ]);
    }
}
