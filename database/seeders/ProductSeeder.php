<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product')->insert([
            // Vinos
            ['name' => 'Château Margaux', 'description' => 'Vino tinto francés de Burdeos, muy elegante.', 'quality_product_id' => 3, 'category_product_id' => 1, 'state' => true, 'manufacturer_id' => 1],
            ['name' => 'Opus One', 'description' => 'Vino californiano icónico de Napa Valley.', 'quality_product_id' => 3, 'category_product_id' => 1, 'state' => true, 'manufacturer_id' => 2],
            ['name' => 'Vega Sicilia Único', 'description' => 'Vino tinto español de Ribera del Duero.', 'quality_product_id' => 3, 'category_product_id' => 1, 'state' => true, 'manufacturer_id' => 3],
            ['name' => 'Sassicaia', 'description' => 'Famoso vino italiano “Super Toscano”.', 'quality_product_id' => 2, 'category_product_id' => 1, 'state' => true, 'manufacturer_id' => 4],
            ['name' => 'Penfolds Grange', 'description' => 'Vino australiano de alta gama.', 'quality_product_id' => 2, 'category_product_id' => 1, 'state' => true, 'manufacturer_id' => 5],
            ['name' => 'Romanée-Conti', 'description' => 'Pinot Noir francés muy exclusivo.', 'quality_product_id' => 3, 'category_product_id' => 1, 'state' => true, 'manufacturer_id' => 6],
            ['name' => 'Marqués de Riscal Reserva', 'description' => 'Vino clásico de Rioja, España.', 'quality_product_id' => 1, 'category_product_id' => 1, 'state' => true, 'manufacturer_id' => 7],
            ['name' => 'Barolo Monfortino', 'description' => 'Poderoso vino tinto del Piamonte.', 'quality_product_id' => 2, 'category_product_id' => 1, 'state' => true, 'manufacturer_id' => 8],
            ['name' => 'Clos Apalta', 'description' => 'Vino de ensamblaje chileno muy premiado.', 'quality_product_id' => 2, 'category_product_id' => 1, 'state' => true, 'manufacturer_id' => 9],
            ['name' => 'Catena Zapata Nicolás', 'description' => 'Blend argentino de alta gama.', 'quality_product_id' => 1, 'category_product_id' => 1, 'state' => true, 'manufacturer_id' => 10],

            // Licores
            ['name' => 'Johnnie Walker Blue Label', 'description' => 'Whisky escocés blended premium.', 'quality_product_id' => 3, 'category_product_id' => 2, 'state' => true, 'manufacturer_id' => 11],
            ['name' => 'Patrón Silver', 'description' => 'Tequila blanco de alta calidad.', 'quality_product_id' => 2, 'category_product_id' => 2, 'state' => true, 'manufacturer_id' => 12],
            ['name' => 'Baileys Irish Cream', 'description' => 'Licor cremoso irlandés.', 'quality_product_id' => 1, 'category_product_id' => 2, 'state' => true, 'manufacturer_id' => 13],
            ['name' => 'Don Julio 1942', 'description' => 'Tequila añejo de lujo.', 'quality_product_id' => 3, 'category_product_id' => 2, 'state' => true, 'manufacturer_id' => 14],
            ['name' => 'Chivas Regal 18', 'description' => 'Whisky escocés suave y complejo.', 'quality_product_id' => 2, 'category_product_id' => 2, 'state' => true, 'manufacturer_id' => 15],
            ['name' => 'Hennessy XO', 'description' => 'Cognac extra old francés.', 'quality_product_id' => 3, 'category_product_id' => 2, 'state' => true, 'manufacturer_id' => 16],
            ['name' => 'Grand Marnier', 'description' => 'Licor de naranja con base de coñac.', 'quality_product_id' => 2, 'category_product_id' => 2, 'state' => true, 'manufacturer_id' => 17],
            ['name' => 'Campari', 'description' => 'Aperitivo amargo italiano.', 'quality_product_id' => 1, 'category_product_id' => 2, 'state' => true, 'manufacturer_id' => 18],
            ['name' => 'Drambuie', 'description' => 'Licor escocés de whisky con miel.', 'quality_product_id' => 1, 'category_product_id' => 2, 'state' => true, 'manufacturer_id' => 19],
            ['name' => 'Cointreau', 'description' => 'Triple sec francés de naranja.', 'quality_product_id' => 1, 'category_product_id' => 2, 'state' => true, 'manufacturer_id' => 20],
        ]);

        DB::statement('ALTER SEQUENCE product_id_seq RESTART WITH 21');
    }
}
