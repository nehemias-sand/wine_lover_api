<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembershipPlanSeeder extends Seeder
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
                'membership_id' => 1,
                'plan_id' => 2,
                'price' => 88.99,
                'cashback_percentage' => 7,
            ],
            [
                'membership_id' => 1,
                'plan_id' => 3,
                'price' => 149.99,
                'cashback_percentage' => 7,
            ],
            [
                'membership_id' => 1,
                'plan_id' => 4,
                'price' => 299.99,
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
                'plan_id' => 2,
                'price' => 58.99,
                'cashback_percentage' => 5,
            ],
            [
                'membership_id' => 2,
                'plan_id' => 3,
                'price' => 99.99,
                'cashback_percentage' => 5,
            ],
            [
                'membership_id' => 2,
                'plan_id' => 4,
                'price' => 199.99,
                'cashback_percentage' => 5,
            ],
            [
                'membership_id' => 3,
                'plan_id' => 1,
                'price' => 14.99,
                'cashback_percentage' => 3,
            ],
            [
                'membership_id' => 3,
                'plan_id' => 2,
                'price' => 43.99,
                'cashback_percentage' => 3,
            ],
            [
                'membership_id' => 3,
                'plan_id' => 3,
                'price' => 79.99,
                'cashback_percentage' => 3,
            ],
            [
                'membership_id' => 3,
                'plan_id' => 4,
                'price' => 159.99,
                'cashback_percentage' => 3,
            ],
        ]);
    }
}
