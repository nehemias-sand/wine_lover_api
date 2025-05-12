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
        DB::table('membership')->insert([
            [
                'name' => 'Silver',
                'description' => 'Beneficios esenciales, acceso anticipado y promociones destacadas.'
            ],
            [
                'name' => 'Gold',
                'description' => 'Ventajas especiales, descuentos exclusivos y un trato preferencial.'
            ],
            [
                'name' => 'Platinum',
                'description' => 'Exclusividad total con beneficios premium, acceso VIP y recompensas máximas.'
            ],
        ]);

        DB::statement('ALTER SEQUENCE membership_id_seq RESTART WITH 4');
    }
}
