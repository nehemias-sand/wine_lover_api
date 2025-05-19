<?php

namespace Database\Seeders;

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
            [
                'profile_id' => 1,
                'permission_id' => 4
            ],
            [
                'profile_id' => 1,
                'permission_id' => 5
            ],
            [
                'profile_id' => 1,
                'permission_id' => 6
            ],
            [
                'profile_id' => 1,
                'permission_id' => 7
            ],

            // Logistic
            [
                'profile_id' => 4,
                'permission_id' => 8
            ],
            [
                'profile_id' => 4,
                'permission_id' => 9
            ],

            // Social
            [
                'profile_id' => 3,
                'permission_id' => 10
            ],
            [
                'profile_id' => 3,
                'permission_id' => 11
            ],
            [
                'profile_id' => 3,
                'permission_id' => 12
            ],
            [
                'profile_id' => 3,
                'permission_id' => 13
            ],
            [
                'profile_id' => 3,
                'permission_id' => 14
            ],

            // Member
            [
                'profile_id' => 2,
                'permission_id' => 10
            ],
            [
                'profile_id' => 2,
                'permission_id' => 15
            ],
            [
                'profile_id' => 2,
                'permission_id' => 16
            ],
            [
                'profile_id' => 2,
                'permission_id' => 17
            ],
            [
                'profile_id' => 2,
                'permission_id' => 18
            ],
            [
                'profile_id' => 2,
                'permission_id' => 19
            ],
            [
                'profile_id' => 2,
                'permission_id' => 20
            ],
        ]);
    }
}
