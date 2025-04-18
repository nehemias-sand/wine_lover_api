<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profile_permission')->insert([
            // Admin
            [
                'profile_id' => 1,
                'permission_id' => 1
            ],
            [
                'profile_id' => 1,
                'permission_id' => 2
            ],
            [
                'profile_id' => 1,
                'permission_id' => 3
            ],
        ]);

        DB::statement('ALTER SEQUENCE profile_permission_id_seq RESTART WITH 4');
    }
}
