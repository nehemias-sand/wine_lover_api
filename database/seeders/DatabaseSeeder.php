<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategoryProductSeeder::class,
            MembershipSeeder::class,
            PaymentSeeder::class,
            PlanSeeder::class,
            QualitySeeder::class,
            ProfileSeeder::class,
            UnitMeasurementSeeder::class,
            DepartmentSeeder::class,
            MunicipalitySeeder::class,
            DistrictSeeder::class,
            PermissionTypeSeeder::class,
            PermissionSeeder::class,
            ProfilePermissionSeeder::class,
        ]);
    }
}
