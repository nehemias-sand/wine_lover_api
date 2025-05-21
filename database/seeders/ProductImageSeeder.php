<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_image')->insert([
            // Château Margaux
            ['product_id' => 1, 'state' => true, 'url_image' => 'images/products/1/80ce44b1-3e1f-4de7-81a9-2c55bc29d31c.jpg'],
            ['product_id' => 1, 'state' => true, 'url_image' => 'images/products/1/09521aca-a31d-451e-b1bb-8b975affdfa6.jpg'],
            // Opus One
            ['product_id' => 2, 'state' => true, 'url_image' => 'images/products/2/5d10efb7-1028-42e5-bc83-ec536058ff3c.jpg'],
            ['product_id' => 2, 'state' => true, 'url_image' => 'images/products/2/070fadc0-66bb-4c02-a17d-5fd81c0b9f5d.jpg'],
            // Vega Sicilia Único
            ['product_id' => 3, 'state' => true, 'url_image' => 'images/products/3/13df16d8-a452-4265-a6cd-a4241441fb89.jpg'],
            ['product_id' => 3, 'state' => true, 'url_image' => 'images/products/3/4996f90d-91d5-4b77-b63c-534e358e29d7.jpg'],
            // Sassicaia
            ['product_id' => 4, 'state' => true, 'url_image' => 'images/products/4/aad26a92-c4d8-4d49-a591-b54da92ad5cc.jpg'],
            ['product_id' => 4, 'state' => true, 'url_image' => 'images/products/4/7d56e7ab-761f-460b-88b9-dba7a118ed15.jpg'],
            // Penfolds Grange
            ['product_id' => 5, 'state' => true, 'url_image' => 'images/products/5/0ed1ffc0-7828-42b4-be8b-aa00fdbe8fcf.jpg'],
            ['product_id' => 5, 'state' => true, 'url_image' => 'images/products/5/cfb4c0ff-433c-436f-8bb3-f0c8a2f49d42.jpg'],
            // Romanée-Conti
            ['product_id' => 6, 'state' => true, 'url_image' => 'images/products/6/0016978c-e728-484d-9b48-9f6c6982dbb4.jpg'],
            ['product_id' => 6, 'state' => true, 'url_image' => 'images/products/6/97407aec-f630-44f0-bd20-1f845878e25b.jpg'],
            // Marqués de Riscal Reserva
            ['product_id' => 7, 'state' => true, 'url_image' => 'images/products/7/98b7c208-cff0-4d7d-b60e-0d750ab9c43c.jpg'],
            ['product_id' => 7, 'state' => true, 'url_image' => 'images/products/7/4a29b56f-3fd7-4f82-9acd-3689583f5e51.jpg'],
            // Barolo Monfortino
            ['product_id' => 8, 'state' => true, 'url_image' => 'images/products/8/dc2a10a3-87cb-4add-974a-9d9a1cc26b32.jpg'],
            ['product_id' => 8, 'state' => true, 'url_image' => 'images/products/8/6308eed9-7b5a-4f69-b76a-3213158083b6.jpg'],
            // Clos Apalta
            ['product_id' => 9, 'state' => true, 'url_image' => 'images/products/9/fc0e2e7b-b0d2-4340-bcad-89b524fcdd1e.jpg'],
            ['product_id' => 9, 'state' => true, 'url_image' => 'images/products/9/e8ec3896-eeab-4e33-bc76-08e7f922c1c6.jpg'],
            // Catena Zapata Nicolás
            ['product_id' => 10, 'state' => true, 'url_image' => 'images/products/10/138bdc59-b20d-44d9-a61d-f73d2b387447.jpg'],
            ['product_id' => 10, 'state' => true, 'url_image' => 'images/products/10/e7a9c892-46f1-4d38-8955-7fb74b432e94.jpg'],
            // Johnnie Walker Blue Label
            ['product_id' => 11, 'state' => true, 'url_image' => 'images/products/11/85da711d-60cc-4956-919a-917253e0c31c.jpg'],
            ['product_id' => 11, 'state' => true, 'url_image' => 'images/products/11/a7466ee7-26e5-4d61-b044-781758434417.jpg'],
            // Patrón Silver
            ['product_id' => 12, 'state' => true, 'url_image' => 'images/products/12/f5d61a67-3b7d-4036-ad33-6aa10f0d35b9.jpg'],
            ['product_id' => 12, 'state' => true, 'url_image' => 'images/products/12/60264091-91ed-45c6-a2c0-7ec745d953a7.jpg'],
            // Baileys Irish Cream
            ['product_id' => 13, 'state' => true, 'url_image' => 'images/products/13/cc9f4735-cdaa-4483-a015-18fcb46afff0.jpg'],
            ['product_id' => 13, 'state' => true, 'url_image' => 'images/products/13/5e117f80-f937-4486-bcc2-3c2098356d33.jpg'],
            // Don Julio 1942
            ['product_id' => 14, 'state' => true, 'url_image' => 'images/products/14/c23e86ed-c0ad-4f29-bdc8-1eba8916dfb8.jpg'],
            ['product_id' => 14, 'state' => true, 'url_image' => 'images/products/14/5a9bb7cf-8db8-4752-925b-639a6091318b.jpg'],
            // Chivas Regal 18
            ['product_id' => 15, 'state' => true, 'url_image' => 'images/products/15/df0b26b9-6e34-4db9-b5de-1bfaff887116.jpg'],
            ['product_id' => 15, 'state' => true, 'url_image' => 'images/products/15/ed8505d7-666a-4fe6-9902-e927b740c3bd.jpg'],
            // Hennessy XO
            ['product_id' => 16, 'state' => true, 'url_image' => 'images/products/16/34c2a851-6427-422d-8575-9ae2e3cd8679.jpg'],
            ['product_id' => 16, 'state' => true, 'url_image' => 'images/products/16/2721ef1f-f594-459f-92b2-2eeb8650ddf9.jpg'],
            // Grand Marnier
            ['product_id' => 17, 'state' => true, 'url_image' => 'images/products/17/c300e78b-0cdf-4c31-b280-fd0cbf4bbe41.jpg'],
            ['product_id' => 17, 'state' => true, 'url_image' => 'images/products/17/cf60745e-d455-432b-8aa4-9892369c79b3.jpg'],
            // Campari
            ['product_id' => 18, 'state' => true, 'url_image' => 'images/products/18/b503702b-9ff7-42ec-9fc3-df99f49db6bb.jpg'],
            ['product_id' => 18, 'state' => true, 'url_image' => 'images/products/18/0993fae3-c5ec-499f-a45e-a0391449cdaf.jpg'],
            // Drambuie
            ['product_id' => 19, 'state' => true, 'url_image' => 'images/products/19/3c6ad763-b3b9-4937-83d6-4ecc53810dab.jpg'],
            ['product_id' => 19, 'state' => true, 'url_image' => 'images/products/19/d4058485-97bb-4988-9530-a0dc9217af95.jpg'],
            // Cointreau
            ['product_id' => 20, 'state' => true, 'url_image' => 'images/products/20/b3f1c073-cc6f-41c4-aaa2-f2382cce184c.jpg'],
            ['product_id' => 20, 'state' => true, 'url_image' => 'images/products/20/9478ec6c-d3d9-4b1d-b5e8-b30964c76c12.jpg'],
        ]);

        DB::statement('ALTER SEQUENCE product_image_id_seq RESTART WITH 41');
    }
}
