<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_status')->insert([
            [
                'name' => 'Procesando'
            ],
            [
                'name' => 'Listo para entregar'
            ],
            [
                'name' => 'En ruta'
            ],
            [
                'name' => 'Entregado'
            ]
        ]);

        DB::statement('ALTER SEQUENCE order_status_id_seq RESTART WITH 5');
    }
}
