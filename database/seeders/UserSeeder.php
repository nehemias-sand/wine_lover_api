<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'email' => 'admin@winelover.com',
                'password' => Hash::make('ADMIN123'),
                'profile_id' => 1,
            ],
            [
                'username' => 'member',
                'email' => 'member@winelover.com',
                'password' => Hash::make('MEMBER123'),
                'profile_id' => 2,
            ],
            [
                'username' => 'social',
                'email' => 'social@winelover.com',
                'password' => Hash::make('SOCIAL123'),
                'profile_id' => 3,
            ],
            [
                'username' => 'logistic',
                'email' => 'logistic@winelover.com',
                'password' => Hash::make('LOGISTIC123'),
                'profile_id' => 4,
            ]
        ]);

        DB::statement('ALTER SEQUENCE unit_measurement_id_seq RESTART WITH 5');
    }
}
