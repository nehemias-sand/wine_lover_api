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
                'name' => 'GET_USERS',
                'description' => 'Autoriza obtener todos los usuario',
                'permission_type_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'CREATE_USER',
                'description' => 'Autoriza la inserción de un usuario',
                'permission_type_id' => 1
            ],
            [
                'id' => 3,
                'name' => 'UPDATE_USER',
                'description' => 'Autoriza la actualización de un usuario',
                'permission_type_id' => 1
            ],
            [
                'id' => 4,
                'name' => 'GET_CLIENTS',
                'description' => 'Autoriza obtener todos los clientes',
                'permission_type_id' => 1
            ],
            [
                'id' => 5,
                'name' => 'CREATE_PRODUCT',
                'description' => 'Autoriza la inserción de un producto',
                'permission_type_id' => 1
            ],
            [
                'id' => 6,
                'name' => 'UPDATE_PRODUCT',
                'description' => 'Autoriza la modificación de un producto',
                'permission_type_id' => 1
            ],
            [
                'id' => 7,
                'name' => 'DELETE_PRODUCT',
                'description' => 'Autoriza la eliminación de un producto',
                'permission_type_id' => 1
            ],
            [
                'id' => 8,
                'name' => 'GET_ORDERS',
                'description' => 'Autoriza obtener todas las ordenes',
                'permission_type_id' => 1
            ],
            [
                'id' => 9,
                'name' => 'UPDATE_ORDER_STATUS',
                'description' => 'Autoriza la modificación del status de una orden',
                'permission_type_id' => 1
            ],
            [
                'id' => 10,
                'name' => 'GET_REVIEWS',
                'description' => 'Autoriza obtener las reviews publicadas',
                'permission_type_id' => 1
            ],
            [
                'id' => 11,
                'name' => 'CREATE_REVIEW',
                'description' => 'Autoriza la publicación de una review',
                'permission_type_id' => 1
            ],
            [
                'id' => 12,
                'name' => 'UPDATE_REVIEW',
                'description' => 'Autoriza la actualización de una review',
                'permission_type_id' => 1
            ],
            [
                'id' => 13,
                'name' => 'DELETE_REVIEW',
                'description' => 'Autoriza la eliminación de una review',
                'permission_type_id' => 1
            ],
            [
                'id' => 14,
                'name' => 'BAN_REVIEW_COMMENT',
                'description' => 'Autoriza poder banear comentarios de una review',
                'permission_type_id' => 1
            ],
            [
                'id' => 15,
                'name' => 'MANAGE_OWN_CLIENT_INFO',
                'description' => 'Autoriza la administración de direcciones',
                'permission_type_id' => 1
            ],
            [
                'id' => 16,
                'name' => 'MANAGE_OWN_ADDRESSES',
                'description' => 'Autoriza la administración de direcciones',
                'permission_type_id' => 1
            ],
            [
                'id' => 17,
                'name' => 'MANAGE_OWN_CARDS',
                'description' => 'Autoriza la administración de las tarjetas',
                'permission_type_id' => 1
            ],
            [
                'id' => 18,
                'name' => 'MANAGE_OWN_ORDERS',
                'description' => 'Autoriza la administración de las ordenes realizadas',
                'permission_type_id' => 1
            ],
            [
                'id' => 19,
                'name' => 'MANAGE_OWN_MEMBERSHIP',
                'description' => 'Autoriza la administración de la membresia',
                'permission_type_id' => 1
            ],
            [
                'id' => 20,
                'name' => 'MANAGE_OWN_COMMENTS',
                'description' => 'Autoriza la administración de los comentarios realizados',
                'permission_type_id' => 1
            ],
        ]);

        DB::statement('ALTER SEQUENCE permission_id_seq RESTART WITH 20');
    }
}
