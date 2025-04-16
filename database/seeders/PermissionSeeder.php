<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permission')->insert([
            [
                'name' => 'CREATE_PRODUCT',
                'description' => 'Autoriza la inserción de registros en la tabla de productos',
                'permission_type_id' => 1
            ],
            [
                'name' => 'UPDATE_PRODUCT',
                'description' => 'Autoriza la modificación de registros existentes en la tabla de productos',
                'permission_type_id' => 1
            ],
            [
                'name' => 'DELETE_PRODUCT',
                'description' => 'Autoriza la eliminación de registros en la tabla de productos',
                'permission_type_id' => 1
            ],

            [
                'name' => 'CREATE_ADDRESS',
                'description' => 'Autoriza la inserción de registros en la tabla de dirección',
                'permission_type_id' => 1
            ],
            [
                'name' => 'UPDATE_ADDRESS',
                'description' => 'Autoriza la modificación de registros existentes en la tabla de dirección',
                'permission_type_id' => 1
            ],
            [
                'name' => 'DELETE_ADDRESS',
                'description' => 'Autoriza la eliminación de registros en la tabla de dirección',
                'permission_type_id' => 1
            ]
        ]);

        DB::statement('ALTER SEQUENCE permission_id_seq RESTART WITH 7');
    }
}
