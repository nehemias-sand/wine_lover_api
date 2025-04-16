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

            // Client
            [
                'profile_id' => 2,
                'permission_id' => 4
            ],
            [
                'profile_id' => 2,
                'permission_id' => 5
            ],
            [
                'profile_id' => 2,
                'permission_id' => 6
            ],
        ]);
    }
}
