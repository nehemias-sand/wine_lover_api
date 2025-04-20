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
                'id' => 1,
                'name' => 'CREATE_PRODUCT',
                'description' => 'Autoriza la inserción de un producto',
                'permission_type_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'UPDATE_PRODUCT',
                'description' => 'Autoriza la modificación de un producto',
                'permission_type_id' => 1
            ],
            [
                'id' => 3,
                'name' => 'DELETE_PRODUCT',
                'description' => 'Autoriza la eliminación de un producto',
                'permission_type_id' => 1
            ],
            [
                'id' => 4,
                'name' => 'GET_REVIEWS',
                'description' => 'Autoriza obtener las reviews publicadas',
                'permission_type_id' => 1
            ],
            [
                'id' => 5,
                'name' => 'CREATE_REVIEW',
                'description' => 'Autoriza la publicación de una review',
                'permission_type_id' => 1
            ],
            [
                'id' => 6,
                'name' => 'UPDATE_REVIEW',
                'description' => 'Autoriza la actualización de una review',
                'permission_type_id' => 1
            ],
            [
                'id' => 7,
                'name' => 'DELETE_REVIEW',
                'description' => 'Autoriza la eliminación de una review',
                'permission_type_id' => 1
            ],
            [
                'id' => 8,
                'name' => 'GET_REVIEW_COMMETS',
                'description' => 'Autoriza poder ver comentarios de una review',
                'permission_type_id' => 1
            ],
            [
                'id' => 9,
                'name' => 'BAN_REVIEW_COMMENT',
                'description' => 'Autoriza poder banear comentarios de una review',
                'permission_type_id' => 1
            ],
            [
                'id' => 10,
                'name' => 'CREATE_ADDRESS',
                'description' => 'Autoriza la inserción de una dirección',
                'permission_type_id' => 1
            ],
            [
                'id' => 11,
                'name' => 'UPDATE_ADDRESS',
                'description' => 'Autoriza la modificación de una dirección',
                'permission_type_id' => 1
            ],
            [
                'id' => 12,
                'name' => 'DELETE_ADDRESS',
                'description' => 'Autoriza la eliminación de una dirección',
                'permission_type_id' => 1
            ],
        ]);

        DB::statement('ALTER SEQUENCE permission_id_seq RESTART WITH 13');
    }
}
