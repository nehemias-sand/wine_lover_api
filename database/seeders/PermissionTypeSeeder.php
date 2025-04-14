<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permission_type')->insert([
            [
                'name' => 'Perfil'
            ],
            [
                'name' => 'Usuario'
            ],
        ]);

        DB::statement('ALTER SEQUENCE permission_type_id_seq RESTART WITH 3');
    }
}
