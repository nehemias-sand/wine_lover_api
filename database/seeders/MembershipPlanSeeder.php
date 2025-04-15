<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('membership_plan')->insert([
            [
                'membership_id' => 1,
                'plan_id' => 1,
                'price' => 29.99,
                'cashback_percentage' => 7,
            ],
            [
                'membership_id' => 2,
                'plan_id' => 1,
                'price' => 19.99,
                'cashback_percentage' => 5,
            ],
            [
                'membership_id' => 2,
                'plan_id' => 1,
                'price' => 14.99,
                'cashback_percentage' => 3,
            ],
        ]);
    }
}
