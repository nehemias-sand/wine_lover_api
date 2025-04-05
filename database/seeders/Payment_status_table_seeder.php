<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Payment_status_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_status')->insert([
            [
                'name'=>'Completado'
            ],
            [
                'name'=>'Rechazado'
            ],
            [
                'name'=>'Procesando'
            ]
        ]);
        
        DB::statement('ALTER SEQUENCE payment_status_id_seq RESTART WITH 4');
    }
}
