<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profile')->insert([
            [
                'name' => 'Admin',
                'description' => 'Administrador del sistema.',
            ],
            [
                'name' => 'Member',
                'description' => 'Usuario registrado que tiene acceso a productos, ofertas y beneficios exclusivos según su nivel de suscripción.',
            ],
            [
                'name' => 'Social',
                'description' => 'Encargado de promocionar ofertas, eventos y contenido relacionado con la tienda en redes sociales y otros canales de comunicación.',
            ],
            [
                'name' => 'Logistic',
                'description' => 'Responsable de la gestión, envío y coordinación de la entrega de productos.',
            ],
        ]);

        DB::statement('ALTER SEQUENCE profile_id_seq RESTART WITH 5');
    }
}
