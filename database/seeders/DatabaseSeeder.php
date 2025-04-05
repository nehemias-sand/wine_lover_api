<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            category_product_table_seeder::class,
            Membership_table_seeder::class,
            Payment_status_table_seeder::class,
            Plan_table_seeder::class,
            Quality_product_table_seeder::class,
            Unit_measure_table_seeder::class
        ]);
    }
}
