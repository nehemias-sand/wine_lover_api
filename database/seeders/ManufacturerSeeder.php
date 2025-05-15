<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('manufacturer')->insert([
            // Vinos
            [
                'name' => 'Château Margaux',
                'city' => 'Margaux',
                'country' => 'Francia',
                'description' => 'Productor histórico de vinos en la región de Burdeos, reconocido por su elegancia.'
            ],
            [
                'name' => 'Opus One Winery',
                'city' => 'Oakville',
                'country' => 'Estados Unidos',
                'description' => 'Bodega de Napa Valley fundada por Robert Mondavi y Baron Philippe de Rothschild.'
            ],
            [
                'name' => 'Vega Sicilia',
                'city' => 'Valbuena de Duero',
                'country' => 'España',
                'description' => 'Productor legendario de Ribera del Duero, famoso por su vino “Único”.'
            ],
            [
                'name' => 'Tenuta San Guido',
                'city' => 'Bolgheri',
                'country' => 'Italia',
                'description' => 'Bodega creadora del famoso vino “Sassicaia”, pionero del estilo Super Toscano.'
            ],
            [
                'name' => 'Penfolds',
                'city' => 'Adelaida',
                'country' => 'Australia',
                'description' => 'Una de las bodegas más prestigiosas de Australia, conocida por su Grange.'
            ],
            [
                'name' => 'Domaine de la Romanée-Conti',
                'city' => 'Vosne-Romanée',
                'country' => 'Francia',
                'description' => 'Productor de los vinos Pinot Noir más exclusivos y cotizados del mundo.'
            ],
            [
                'name' => 'Marqués de Riscal',
                'city' => 'Elciego',
                'country' => 'España',
                'description' => 'Bodega clásica de Rioja, pionera en introducir vinos de calidad internacional.'
            ],
            [
                'name' => 'Giacomo Conterno',
                'city' => 'Monforte d’Alba',
                'country' => 'Italia',
                'description' => 'Productor renombrado del Barolo Monfortino, ícono del Piamonte.'
            ],
            [
                'name' => 'Clos Apalta Winery',
                'city' => 'Santa Cruz',
                'country' => 'Chile',
                'description' => 'Bodega de vinos de ensamblaje altamente premiados en el Valle de Colchagua.'
            ],
            [
                'name' => 'Catena Zapata',
                'city' => 'Mendoza',
                'country' => 'Argentina',
                'description' => 'Bodega líder en vinos de alta gama en Argentina, famosa por sus blends.'
            ],

            // Licores
            [
                'name' => 'Johnnie Walker',
                'city' => 'Kilmarnock',
                'country' => 'Escocia',
                'description' => 'Marca icónica de whisky escocés blended, reconocida mundialmente.'
            ],
            [
                'name' => 'Patrón Spirits Company',
                'city' => 'Atotonilco El Alto',
                'country' => 'México',
                'description' => 'Productores de tequila premium elaborados artesanalmente.'
            ],
            [
                'name' => 'Baileys',
                'city' => 'Dublín',
                'country' => 'Irlanda',
                'description' => 'Marca pionera del licor cremoso de whisky irlandés.'
            ],
            [
                'name' => 'Don Julio',
                'city' => 'Atotonilco El Alto',
                'country' => 'México',
                'description' => 'Tequila de lujo con procesos tradicionales y alta calidad.'
            ],
            [
                'name' => 'Chivas Regal',
                'city' => 'Keith',
                'country' => 'Escocia',
                'description' => 'Whisky escocés suave y refinado con mezclas de 18 años.'
            ],
            [
                'name' => 'Hennessy',
                'city' => 'Cognac',
                'country' => 'Francia',
                'description' => 'Casa histórica de coñac, especializada en ediciones premium como XO.'
            ],
            [
                'name' => 'Grand Marnier',
                'city' => 'Neauphle-le-Château',
                'country' => 'Francia',
                'description' => 'Licor francés que combina coñac con esencia de naranja amarga.'
            ],
            [
                'name' => 'Campari Group',
                'city' => 'Milán',
                'country' => 'Italia',
                'description' => 'Empresa de bebidas italiana famosa por su aperitivo rojo amargo.'
            ],
            [
                'name' => 'Drambuie',
                'city' => 'Glasgow',
                'country' => 'Escocia',
                'description' => 'Licor escocés a base de whisky, miel, hierbas y especias.'
            ],
            [
                'name' => 'Cointreau',
                'city' => 'Angers',
                'country' => 'Francia',
                'description' => 'Licor triple sec de naranja reconocido mundialmente por su calidad.'
            ],
        ]);

        DB::statement('ALTER SEQUENCE manufacturer_id_seq RESTART WITH 21');
    }
}
