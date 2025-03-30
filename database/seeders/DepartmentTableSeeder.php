<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("department")->insert([
            [
                'name' => 'Ahuachapan'
            ],
            [
                'name' => 'San Salvador'
            ],
            [
                'name' => 'La Libertad'
            ],
            [
                'name' => 'Chalatenango'
            ],
            [
                'name' => 'Cuscatlan'
            ],
            [
                'name' => 'Cabañas'
            ],
            [
                'name' => 'La Paz'
            ],
            [
                'name' => 'La Union'
            ],
            [
                'name' => 'Usulutan'
            ],
            [
                'name' => 'Sonsonate'
            ],
            [
                'name' => 'Santa Ana'
            ],
            [
                'name' => 'San Vicente'
            ],
            [
                'name' => 'San Miguel'
            ],
            [
                'name' => 'Morazan'
            ],
        ]);

        DB::statement('ALTER SEQUENCE department_id_seq RESTART WITH 15');
    }
}
