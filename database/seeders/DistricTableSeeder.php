<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistricTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('district')->insert([
            [
                'name' => 'Atiquizaya',
                'municipality_id' => 1
            ],
            [
                'name' => 'El Refugio',
                'municipality_id' => 1
            ],
            [
                'name' => 'San Lorenzo',
                'municipality_id' => 1
            ],
            [
                'name' => 'Turin',
                'municipality_id' => 1
            ],
            [
                'name' => 'Ahuachapan',
                'municipality_id' => 2
            ],
            [
                'name' => 'Apaneca',
                'municipality_id' => 2
            ],
            [
                'name' => 'Concepción de Ataco',
                'municipality_id' => 2
            ],
            [
                'name' => 'Tacuba',
                'municipality_id' => 2
            ],
            [
                'name' => 'Guaymango',
                'municipality_id' => 3
            ],
            [
                'name' => 'Jujutla',
                'municipality_id' => 3
            ],
            [
                'name' => 'San Francisco Menendez',
                'municipality_id' => 3
            ],
            [
                'name' => 'San Pedro Puxtla',
                'municipality_id' => 3
            ],
            [
                'name' => 'Aguilares',
                'municipality_id' => 4
            ],
            [
                'name' => 'El Paisnal',
                'municipality_id' => 4
            ],
            [
                'name' => 'Guazapa',
                'municipality_id' => 4
            ],
            [
                'name' => 'Apopa',
                'municipality_id' => 5
            ],
            [
                'name' => 'Nejapa',
                'municipality_id' => 5
            ],
            [
                'name' => 'llopango',
                'municipality_id' => 6
            ],
            [
                'name' => 'San Martín',
                'municipality_id' => 6
            ],
            [
                'name' => 'Soyapango',
                'municipality_id' => 6
            ],
            [
                'name' => 'Tonacatepeque',
                'municipality_id' => 6
            ],
            [
                'name' => 'Ayutuxtepeque',
                'municipality_id' => 7
            ],
            [
                'name' => 'Mejicanos',
                'municipality_id' => 7
            ],
            [
                'name' => 'San Salvador',
                'municipality_id' => 7
            ],
            [
                'name' => 'Cuscatancingo',
                'municipality_id' => 7
            ],
            [
                'name' => 'Ciudad Delgado',
                'municipality_id' => 7
            ],
            [
                'name' => 'Panchimalco',
                'municipality_id' => 8
            ],
            [
                'name' => 'Rosario de Mora',
                'municipality_id' => 8
            ],
            [
                'name' => 'San Marcos',
                'municipality_id' => 8
            ],
            [
                'name' => 'Santo Tomás',
                'municipality_id' => 8
            ],
            [
                'name' => 'Santiago Texacuangos',
                'municipality_id' => 8
            ],
            [
                'name' => 'Quezaltepeque',
                'municipality_id' => 9
            ],
            [
                'name' => 'San Matías',
                'municipality_id' => 9
            ],
            [
                'name' => 'San Pablo Tacachico',
                'municipality_id' => 9
            ],
            [
                'name' => 'San Juan Opico',
                'municipality_id' => 10
            ],
            [
                'name' => 'Ciudad Arce',
                'municipality_id' => 10
            ],
            [
                'name' => 'Colón',
                'municipality_id' => 11
            ],
            [
                'name' => 'Jayaque',
                'municipality_id' => 11
            ],
            [
                'name' => 'Sacacoyo',
                'municipality_id' => 11
            ],
            [
                'name' => 'Tepecoyo',
                'municipality_id' => 11
            ],
            [
                'name' => 'Talnique',
                'municipality_id' => 11
            ],
            [
                'name' => 'Antiguo Cuscatlán',
                'municipality_id' => 12
            ],
            [
                'name' => 'Huizucar',
                'municipality_id' => 12
            ],
            [
                'name' => 'Nuevo Cuscatlán',
                'municipality_id' => 12
            ],
            [
                'name' => 'San José Villanueva',
                'municipality_id' => 12
            ],
            [
                'name' => 'Zaragoza',
                'municipality_id' => 12
            ],
            [
                'name' => 'Chiltuipán',
                'municipality_id' => 13
            ],
            [
                'name' => 'Jicalapa',
                'municipality_id' => 13
            ],
            [
                'name' => 'La Libertad',
                'municipality_id' => 13
            ],
            [
                'name' => 'Tamanique',
                'municipality_id' => 13
            ],
            [
                'name' => 'Teotepeque',
                'municipality_id' => 13
            ],
            [
                'name' => 'Comasagua',
                'municipality_id' => 14
            ],
            [
                'name' => 'Santa Tecla',
                'municipality_id' => 14
            ],
            [
                'name' => 'La Palma',
                'municipality_id' => 15
            ],
            [
                'name' => 'Citalá',
                'municipality_id' => 15
            ],
            [
                'name' => 'San Ignacio',
                'municipality_id' => 15
            ],
            [
                'name' => 'Nueva Concepción',
                'municipality_id' => 16
            ],
            [
                'name' => 'Tejutla',
                'municipality_id' => 16
            ],
            [
                'name' => 'La Reina',
                'municipality_id' => 16
            ],
            [
                'name' => 'Agua Caliente',
                'municipality_id' => 16
            ],
            [
                'name' => 'Dulce Nombre de María',
                'municipality_id' => 16
            ],
            [
                'name' => 'El Paraíso',
                'municipality_id' => 16
            ],
            [
                'name' => 'San Francisco Morazán',
                'municipality_id' => 16
            ],
            [
                'name' => 'San Rafael',
                'municipality_id' => 16
            ],
            [
                'name' => 'Santa Rita',
                'municipality_id' => 16
            ],
            [
                'name' => 'San Fernando',
                'municipality_id' => 16
            ],
            [
                'name' => 'Chalatenango',
                'municipality_id' => 17
            ],
            [
                'name' => 'Arcatao',
                'municipality_id' => 17
            ],
            [
                'name' => 'Azacualpa',
                'municipality_id' => 17
            ],
            [
                'name' => 'Comalapa',
                'municipality_id' => 17
            ],
            [
                'name' => 'Concepción Quezaltepeque',
                'municipality_id' => 17
            ],
            [
                'name' => 'El Carrizal',
                'municipality_id' => 17
            ],
            [
                'name' => 'La Laguna',
                'municipality_id' => 17
            ],
            [
                'name' => 'Las Vueltas',
                'municipality_id' => 17
            ],
            [
                'name' => 'Nombre de Jesús',
                'municipality_id' => 17
            ],
            [
                'name' => 'Nueva Trinidad',
                'municipality_id' => 17
            ],
            [
                'name' => 'Ojos de Agua',
                'municipality_id' => 17
            ],
            [
                'name' => 'Potonico',
                'municipality_id' => 17
            ],
            [
                'name' => 'San Antonio de La Cruz',
                'municipality_id' => 17
            ],
            [
                'name' => 'San Antonio Los Ranchos',
                'municipality_id' => 17
            ],
            [
                'name' => 'San Francisco Lempa',
                'municipality_id' => 17
            ],
            [
                'name' => 'San Isidro Labrador',
                'municipality_id' => 17
            ],
            [
                'name' => 'San José Cancasque',
                'municipality_id' => 17
            ],
            [
                'name' => 'San Miguel de Mercedes',
                'municipality_id' => 17
            ],
            [
                'name' => 'San José Las Flores',
                'municipality_id' => 17
            ],
            [
                'name' => 'San Luis del Carmen',
                'municipality_id' => 17
            ],
            [
                'name' => 'Suchitoto',
                'municipality_id' => 18
            ],
            [
                'name' => 'San José Guayabal',
                'municipality_id' => 18
            ],
            [
                'name' => 'Oratorio de Concepción',
                'municipality_id' => 18
            ],
            [
                'name' => 'San Bartolomé Perulapán',
                'municipality_id' => 18
            ],
            [
                'name' => 'San Pedro Perulapán',
                'municipality_id' => 18
            ],
            [
                'name' => 'Cojutepeque',
                'municipality_id' => 19
            ],
            [
                'name' => 'San Rafael Cedros',
                'municipality_id' => 19
            ],
            [
                'name' => 'Candelaria',
                'municipality_id' => 19
            ],
            [
                'name' => 'Monte San Juan',
                'municipality_id' => 19
            ],
            [
                'name' => 'El Carmen',
                'municipality_id' => 19
            ],
            [
                'name' => 'San Cristóbal',
                'municipality_id' => 19
            ],
            [
                'name' => 'Santa Cruz Michapa',
                'municipality_id' => 19
            ],
            [
                'name' => 'San Ramón',
                'municipality_id' => 19
            ],
            [
                'name' => 'El Rosario',
                'municipality_id' => 19
            ],
            [
                'name' => 'Santa Cruz Analquito',
                'municipality_id' => 19
            ],
            [
                'name' => 'Tenancingo',
                'municipality_id' => 19
            ],
            [
                'name' => 'Sensuntepeque',
                'municipality_id' => 20
            ],
            [
                'name' => 'Victoria',
                'municipality_id' => 20
            ],
            [
                'name' => 'Dolores',
                'municipality_id' => 20
            ],
            [
                'name' => 'Guacotecti',
                'municipality_id' => 20
            ],
            [
                'name' => 'San Isidro',
                'municipality_id' => 20
            ],
            [
                'name' => 'llobasco',
                'municipality_id' => 21
            ],
            [
                'name' => 'Tejutepeque',
                'municipality_id' => 21
            ],
            [
                'name' => 'Jutiapa',
                'municipality_id' => 21
            ],
            [
                'name' => 'Cinquera',
                'municipality_id' => 21
            ],
            [
                'name' => 'Cuyultitán',
                'municipality_id' => 22
            ],
            [
                'name' => 'Olocuilta',
                'municipality_id' => 22
            ],
            [
                'name' => 'San Juan Talpa',
                'municipality_id' => 22
            ],
            [
                'name' => 'San Luis Talpa',
                'municipality_id' => 22
            ],
            [
                'name' => 'San Pedro Masahuat',
                'municipality_id' => 22
            ],
            [
                'name' => 'Tapalhuaca',
                'municipality_id' => 22
            ],
            [
                'name' => 'San Francisco Chinameca',
                'municipality_id' => 22
            ],
            [
                'name' => 'El Rosario',
                'municipality_id' => 23
            ],
            [
                'name' => 'Jerusalén',
                'municipality_id' => 23
            ],
            [
                'name' => 'Mercedes La Ceiba',
                'municipality_id' => 23
            ],
            [
                'name' => 'Paraíso de Osorio',
                'municipality_id' => 23
            ],
            [
                'name' => 'San Antonio Masahuat',
                'municipality_id' => 23
            ],
            [
                'name' => 'San Emigdio',
                'municipality_id' => 23
            ],
            [
                'name' => 'San Juan Tepezontes',
                'municipality_id' => 23
            ],
            [
                'name' => 'San Luis La Herradura',
                'municipality_id' => 23
            ],
            [
                'name' => 'San Miguel Tepezontes',
                'municipality_id' => 23
            ],
            [
                'name' => 'San Pedro Nonualco',
                'municipality_id' => 23
            ],
            [
                'name' => 'Santa María Ostuma',
                'municipality_id' => 23
            ],
            [
                'name' => 'Santiago Nonualco',
                'municipality_id' => 23
            ],
            [
                'name' => 'San Juan Nonualco',
                'municipality_id' => 24
            ],
            [
                'name' => 'San Rafael Obrajuelo',
                'municipality_id' => 24
            ],
            [
                'name' => 'Zacatecoluca',
                'municipality_id' => 24
            ],
            [
                'name' => 'Anamorós',
                'municipality_id' => 25
            ],
            [
                'name' => 'Bolivar',
                'municipality_id' => 25
            ],
            [
                'name' => 'Concepción de Oriente',
                'municipality_id' => 25
            ],
            [
                'name' => 'El Sauce',
                'municipality_id' => 25
            ],

            [
                'name' => 'Lislique',
                'municipality_id' => 25
            ],
            [
                'name' => 'Nueva Esparta',
                'municipality_id' => 25
            ],
            [
                'name' => 'Pasaquina',
                'municipality_id' => 25
            ],
            [
                'name' => 'Polorós',
                'municipality_id' => 25
            ],
            [
                'name' => 'San José La Fuente',
                'municipality_id' => 25
            ],
            [
                'name' => 'Santa Rosa de Lima',
                'municipality_id' => 25
            ],
            [
                'name' => 'Conchagua',
                'municipality_id' => 26
            ],

            [
                'name' => 'El Carmen',
                'municipality_id' => 26
            ],
            [
                'name' => 'lntipucá',
                'municipality_id' => 26
            ],
            [
                'name' => 'La Unión',
                'municipality_id' => 26
            ],
            [
                'name' => 'Meanguera del Golfo',
                'municipality_id' => 26
            ],
            [
                'name' => 'San Alejo',
                'municipality_id' => 26
            ],
            [
                'name' => 'Yayantique',
                'municipality_id' => 26
            ],
            [
                'name' => 'Yucuaiquín',
                'municipality_id' => 26
            ],

            [
                'name' => 'Santiago de María',
                'municipality_id' => 27
            ],
            [
                'name' => 'Alegría',
                'municipality_id' => 27
            ],
            [
                'name' => 'Berlín',
                'municipality_id' => 27
            ],
            [
                'name' => 'Mercedes Umana',
                'municipality_id' => 27
            ],
            [
                'name' => 'Jucuapa',
                'municipality_id' => 27
            ],
            [
                'name' => 'El Triunfo',
                'municipality_id' => 27
            ],
            [
                'name' => 'Estanzuelas',
                'municipality_id' => 27
            ],

            [
                'name' => 'San Buenaventura',
                'municipality_id' => 27
            ],
            [
                'name' => 'Nueva Granada',
                'municipality_id' => 27
            ],
            [
                'name' => 'Usulután',
                'municipality_id' => 28
            ],
            [
                'name' => 'Jucuarán',
                'municipality_id' => 28
            ],
            [
                'name' => 'San Dionisio',
                'municipality_id' => 28
            ],
            [
                'name' => 'Concepción Batres',
                'municipality_id' => 28
            ],
            [
                'name' => 'Santa María',
                'municipality_id' => 28
            ],
            [
                'name' => 'Ozatlán',
                'municipality_id' => 28
            ],
            [
                'name' => 'Tecapán',
                'municipality_id' => 28
            ],
            [
                'name' => 'Santa Elena',
                'municipality_id' => 28
            ],
            [
                'name' => 'California',
                'municipality_id' => 28
            ],
            [
                'name' => 'Ereguayquín',
                'municipality_id' => 28
            ],

            [
                'name' => 'Jiquilisco',
                'municipality_id' => 29
            ],
            [
                'name' => 'Puerto El Triunfo',
                'municipality_id' => 29
            ],
            [
                'name' => 'San Agustín',
                'municipality_id' => 29
            ],
            [
                'name' => 'San Francisco Javier',
                'municipality_id' => 29
            ],
            [
                'name' => 'Juayúa',
                'municipality_id' => 30
            ],
            [
                'name' => 'Nahuizalco',
                'municipality_id' => 30
            ],
            [
                'name' => 'Salcoatitán',
                'municipality_id' => 30
            ],
            [
                'name' => 'Santa Catarina Masahuat',
                'municipality_id' => 30
            ],
            [
                'name' => 'Sonsonate',
                'municipality_id' => 31
            ],
            [
                'name' => 'Sonzacate',
                'municipality_id' => 31
            ],
            [
                'name' => 'Nahulingo',
                'municipality_id' => 31
            ],
            [
                'name' => 'San Antonio del Monte',
                'municipality_id' => 31
            ],
            [
                'name' => 'Santo Domingo de Guzmán',
                'municipality_id' => 31
            ],
            [
                'name' => 'lzalco',
                'municipality_id' => 32
            ],
            [
                'name' => 'Armenia',
                'municipality_id' => 32
            ],
            [
                'name' => 'Caluco',
                'municipality_id' => 32
            ],
            [
                'name' => 'San Julián',
                'municipality_id' => 32
            ],
            [
                'name' => 'Cuisnahuat',
                'municipality_id' => 32
            ],
            [
                'name' => 'Santa Isabel lshuatán',
                'municipality_id' => 32
            ],
            [
                'name' => 'Acajutla',
                'municipality_id' => 33
            ],
            [
                'name' => 'Masahuat',
                'municipality_id' => 34
            ],
            [
                'name' => 'Metapán',
                'municipality_id' => 34
            ],
            [
                'name' => 'Santa Rosa Guachipilín',
                'municipality_id' => 34
            ],
            [
                'name' => 'Texistepeque',
                'municipality_id' => 34
            ],
            [
                'name' => 'Santa Ana',
                'municipality_id' => 35
            ],
            [
                'name' => 'Coatepeque',
                'municipality_id' => 36
            ],
            [
                'name' => 'El Congo',
                'municipality_id' => 36
            ],
            [
                'name' => 'Candelaria de la Frontera',
                'municipality_id' => 37
            ],
            [
                'name' => 'Chalchuapa',
                'municipality_id' => 37
            ],
            [
                'name' => 'El Porvenir',
                'municipality_id' => 37
            ],
            [
                'name' => 'San Antonio Pajonal',
                'municipality_id' => 37
            ],
            [
                'name' => 'San Sebastián Salitrillo',
                'municipality_id' => 37
            ],
            [
                'name' => 'Santiago de La Frontera',
                'municipality_id' => 37
            ],
            [
                'name' => 'Apastepeque',
                'municipality_id' => 38
            ],
            [
                'name' => 'Santa Clara',
                'municipality_id' => 38
            ],
            [
                'name' => 'San Ildefonso',
                'municipality_id' => 38
            ],
            [
                'name' => 'San Esteban Catarina',
                'municipality_id' => 38
            ],
            [
                'name' => 'San Sebastián',
                'municipality_id' => 38
            ],
            [
                'name' => 'San Lorenzo',
                'municipality_id' => 38
            ],
            [
                'name' => 'Santo Domingo',
                'municipality_id' => 38
            ],
            [
                'name' => 'San Vicente',
                'municipality_id' => 39
            ],
            [
                'name' => 'Guadalupe',
                'municipality_id' => 39
            ],
            [
                'name' => 'Verapaz',
                'municipality_id' => 39
            ],
            [
                'name' => 'Tepetitán',
                'municipality_id' => 39
            ],
            [
                'name' => 'Tecoluca',
                'municipality_id' => 39
            ],
            [
                'name' => 'San Cayetano lstepeque',
                'municipality_id' => 39
            ],
            [
                'name' => 'Ciudad Barrios',
                'municipality_id' => 40
            ],
            [
                'name' => 'Sesori',
                'municipality_id' => 40
            ],
            [
                'name' => 'Nuevo Edén de San Juan',
                'municipality_id' => 40
            ],
            [
                'name' => 'San Gerardo',
                'municipality_id' => 40
            ],
            [
                'name' => 'San Luis de La Reina',
                'municipality_id' => 40
            ],
            [
                'name' => 'Carolina',
                'municipality_id' => 40
            ],
            [
                'name' => 'San Antonio del Mosco',
                'municipality_id' => 40
            ],
            [
                'name' => 'Chapeltique',
                'municipality_id' => 40
            ],
            [
                'name' => 'San Miguel',
                'municipality_id' => 41
            ],
            [
                'name' => 'Comacarán',
                'municipality_id' => 41
            ],
            [
                'name' => 'Uluazapa',
                'municipality_id' => 41
            ],
            [
                'name' => 'Moncagua',
                'municipality_id' => 41
            ],
            [
                'name' => 'Quelepa',
                'municipality_id' => 41
            ],
            [
                'name' => 'Chirilagua',
                'municipality_id' => 41
            ],
            [
                'name' => 'Chinameca',
                'municipality_id' => 42
            ],
            [
                'name' => 'Nueva Guadalupe',
                'municipality_id' => 42
            ],
            [
                'name' => 'Lolotique',
                'municipality_id' => 42
            ],
            [
                'name' => 'San Jorge',
                'municipality_id' => 42
            ],
            [
                'name' => 'San Rafael Oriente',
                'municipality_id' => 42
            ],
            [
                'name' => 'El Tránsito',
                'municipality_id' => 42
            ],
            [
                'name' => 'Arambala',
                'municipality_id' => 43
            ],
            [
                'name' => 'Cacaopera',
                'municipality_id' => 43
            ],
            [
                'name' => 'Corinto',
                'municipality_id' => 43
            ],
            [
                'name' => 'El Rosario',
                'municipality_id' => 43
            ],
            [
                'name' => 'Joateca',
                'municipality_id' => 43
            ],
            [
                'name' => 'Jocoaitique',
                'municipality_id' => 43
            ],
            [
                'name' => 'Meanguera',
                'municipality_id' => 43
            ],
            [
                'name' => 'Perquín',
                'municipality_id' => 43
            ],
            [
                'name' => 'San Fernando',
                'municipality_id' => 43
            ],
            [
                'name' => 'San Isidro',
                'municipality_id' => 43
            ],
            [
                'name' => 'Torola',
                'municipality_id' => 43
            ],
            [
                'name' => 'Chilanga',
                'municipality_id' => 44
            ],
            [
                'name' => 'Delicias de Concepción',
                'municipality_id' => 44
            ],
            [
                'name' => 'El Divisadero',
                'municipality_id' => 44
            ],
            [
                'name' => 'Gualococti',
                'municipality_id' => 44
            ],
            [
                'name' => 'Guatajiagua',
                'municipality_id' => 44
            ],
            [
                'name' => 'Jocoro',
                'municipality_id' => 44
            ],
            [
                'name' => 'Lolotiquillo',
                'municipality_id' => 44
            ],
            [
                'name' => 'Osicala',
                'municipality_id' => 44
            ],
            [
                'name' => 'San Carlos',
                'municipality_id' => 44
            ],
            [
                'name' => 'San Francisco Gotera',
                'municipality_id' => 44
            ],
            [
                'name' => 'San Simón',
                'municipality_id' => 44
            ],
            [
                'name' => 'Sensembra',
                'municipality_id' => 44
            ],
            [
                'name' => 'Sociedad',
                'municipality_id' => 44
            ],
            [
                'name' => 'Yamabal',
                'municipality_id' => 44
            ],
            [
                'name' => 'Yoloaiquín',
                'municipality_id' => 44
            ]
        ]);

        
        DB::statement('ALTER SEQUENCE district_id_seq RESTART WITH 263');
    }
}
