<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_method')->insert([
            [
                'name' => 'Tarjeta'
            ],
            [
                'name' => 'Cashback'
            ],
        ]);

        DB::statement('ALTER SEQUENCE payment_status_id_seq RESTART WITH 3');
    }
}
