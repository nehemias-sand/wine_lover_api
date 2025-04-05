<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('municipality')->insert([
            [
                'name' => 'Ahuachapan Norte',
                'department_id' => 1
            ],
            [
                'name' => 'Ahuachapan Centro',
                'department_id' => 1
            ],
            [
                'name' => 'Ahuachapan Sur',
                'department_id' => 1
            ],
            [
                'name' => 'San Salvador Norte',
                'department_id' => 2
            ],
            [
                'name' => 'San Salvador Oeste',
                'department_id' => 2
            ],
            [
                'name' => 'San Salvador Este',
                'department_id' => 2
            ],
            [
                'name' => 'San Salvador Centro',
                'department_id' => 2
            ],
            [
                'name' => 'San Salvador Sur',
                'department_id' => 2
            ],
            [
                'name' => 'La Libertad Norte',
                'department_id' => 3
            ],
            [
                'name' => 'La Libertad Centro',
                'department_id' => 3
            ],
            [
                'name' => 'La Libertad Oeste',
                'department_id' => 3
            ],
            [
                'name' => 'La Libertad Este',
                'department_id' => 3
            ],
            [
                'name' => 'La Libertad Costa',
                'department_id' => 3
            ],
            [
                'name' => 'La Libertad Sur',
                'department_id' => 3
            ],
            [
                'name' => 'Chalatenango Norte',
                'department_id' => 4
            ],
            [
                'name' => 'Chalatenango Centro',
                'department_id' => 4
            ],
            [
                'name' => 'Chalatenango Sur',
                'department_id' => 4
            ],
            [
                'name' => 'Cuscatlan Norte',
                'department_id' => 5
            ],
            [
                'name' => 'Cuscatlan Sur',
                'department_id' => 5
            ],
            [
                'name' => 'Cabañas Este',
                'department_id' => 6
            ],
            [
                'name' => 'Cabañas Oeste',
                'department_id' => 6
            ],
            [
                'name' => 'La Paz Oeste',
                'department_id' => 7
            ],
            [
                'name' => 'La Paz Centro',
                'department_id' => 7
            ],
            [
                'name' => 'La Paz Este',
                'department_id' => 7
            ],
            [
                'name' => 'La Union Norte',
                'department_id' => 8
            ],
            [
                'name' => 'La Union Sur',
                'department_id' => 8
            ],
            [
                'name' => 'Usulutan Norte',
                'department_id' => 9
            ],
            [
                'name' => 'Usulutan Este',
                'department_id' => 9
            ],
            [
                'name' => 'Usulutan Oeste',
                'department_id' => 9
            ],
            [
                'name' => 'Sonsonate Norte',
                'department_id' => 10
            ],
            [
                'name' => 'Sonsonate Centro',
                'department_id' => 10
            ],
            [
                'name' => 'Sonsonate Este',
                'department_id' => 10
            ],
            [
                'name' => 'Sonsonate Oeste',
                'department_id' => 10
            ],
            [
                'name' => 'Santa Ana Norte',
                'department_id' => 11
            ],
            [
                'name' => 'Santa Ana Centro',
                'department_id' => 11
            ],
            [
                'name' => 'Santa Ana Este',
                'department_id' => 11
            ],
            [
                'name' => 'Santa Ana Oeste',
                'department_id' => 11
            ],
            [
                'name' => 'San Vicente Norte',
                'department_id' => 12
            ],
            [
                'name' => 'San Vicente Sur',
                'department_id' => 12
            ],
            [
                'name' => 'San Miguel Norte',
                'department_id' => 13
            ],
            [
                'name' => 'San Miguel Centro',
                'department_id' => 13
            ],
            [
                'name' => 'San Miguel Oeste',
                'department_id' => 13
            ],
            [
                'name' => 'Morazan Norte',
                'department_id' => 14
            ],
            [
                'name' => 'Morazan Sur',
                'department_id' => 14
            ],
        ]);


        DB::statement('ALTER SEQUENCE municipality_id_seq RESTART WITH 45');
    }
}
