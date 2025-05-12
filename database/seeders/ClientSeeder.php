<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('client')->insert([
            [
                'names' => 'Jose Edgardo',
                'surnames' => 'Urquilla Quezada',
                'identity_number' => '06043254-2',
                'birthday_date' => '2000-04-11',
                'phone' => '7643-1122',
                'user_id' => 2,
            ],
        ]);

        DB::table('address')->insert([
            [
                'name' => 'Casa',
                'neighborhood' => 'Colonia Escalón',
                'street' => 'Calle El Carmen',
                'number' => '567',
                'client_id' => 1,
                'district_id' => 24,
            ],
        ]);

        DB::statement('ALTER SEQUENCE client_id_seq RESTART WITH 2');
        DB::statement('ALTER SEQUENCE address_id_seq RESTART WITH 2');
    }
}
