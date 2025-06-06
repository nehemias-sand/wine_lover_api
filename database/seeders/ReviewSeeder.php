<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('review')->insert([
            [
                'title' => '¿Qué hace especial al vino tinto Malbec argentino?',
                'content' => <<<EOT
El vino Malbec se ha convertido en uno de los emblemas de Argentina, especialmente en la región de Mendoza, donde el clima seco, los suelos pobres en nutrientes y la altitud favorecen el desarrollo de una uva con gran concentración y carácter.

Lo que hace único al Malbec argentino es su color profundo, con tonos violáceos intensos, y su aroma a frutas negras maduras como ciruelas, moras y cerezas, complementado con notas de vainilla, chocolate y tabaco, producto de su crianza en barricas de roble. En boca es sedoso, con taninos suaves y una acidez equilibrada, lo que lo convierte en un vino versátil y fácil de maridar.

Este vino es ideal para acompañar asados, empanadas salteñas o pastas con salsas intensas. Si estás explorando vinos tintos, el Malbec argentino es una excelente puerta de entrada por su riqueza aromática, buena estructura y suavidad al paladar.

Además, muchas bodegas ofrecen experiencias de enoturismo donde puedes recorrer los viñedos, conocer el proceso de vinificación y participar en degustaciones. Visitar Mendoza no es solo una experiencia gastronómica, sino también cultural y sensorial.

En definitiva, el Malbec argentino no es solo un vino: es una expresión del territorio, la pasión de los enólogos y una experiencia que merece ser descubierta.
EOT,
                'cover_image' => 'images/reviews/1/be5ea1bb-6159-4b2a-a6a4-ab4de655568c.jpg',
                'comments_available' => true,
                'user_id' => 1,
            ],
            [
                'title' => 'Cómo elegir un vino blanco según tu comida',
                'content' => <<<EOT
El vino blanco no solo es refrescante, sino también una excelente opción para maridar con una gran variedad de platos. Sin embargo, no todos los vinos blancos son iguales, y elegir el adecuado depende tanto del tipo de comida como del estilo de vino.

Los vinos blancos secos como el Sauvignon Blanc o el Pinot Grigio combinan muy bien con pescados blancos, ensaladas frescas y platos con hierbas. Tienen una acidez marcada y notas cítricas que limpian el paladar y realzan los sabores delicados.

Por otro lado, un Chardonnay con paso por barrica, más untuoso y con notas de mantequilla y vainilla, es ideal para acompañar platos más grasos como pollo en salsa, pastas con crema o mariscos a la parrilla.

Si prefieres algo más aromático, un vino como el Gewürztraminer o el Riesling, con notas florales y algo de dulzor, marida muy bien con comida asiática, especialmente si tiene algo de picante.

Recuerda servir los blancos entre 8 y 12°C para conservar su frescura. Usa copas de boca estrecha para concentrar los aromas. Y si es posible, evita enfriar el vino en el congelador, ya que un cambio brusco de temperatura puede afectar su estructura.

Al conocer tus preferencias y entender qué tipo de comida vas a servir, podrás elegir un vino blanco que no solo complemente el plato, sino que eleve toda la experiencia gastronómica.
EOT,
                'cover_image' => 'images/reviews/2/fe84aab5-43e0-422e-b65b-0de7fea8434a.jpg',
                'comments_available' => true,
                'user_id' => 1,
            ],
            [
                'title' => 'Vino rosado: no es solo para el verano',
                'content' => <<<EOT
Durante mucho tiempo, el vino rosado fue considerado una opción secundaria frente a los tintos y blancos. Sin embargo, hoy en día está viviendo un renacimiento gracias a su versatilidad, frescura y elegancia. Ideal para quienes buscan un equilibrio entre la ligereza del blanco y la estructura del tinto.

El rosado se elabora a partir de uvas tintas con un contacto breve con las pieles, lo que le da ese color rosado claro o intenso dependiendo del tiempo de maceración. A diferencia de lo que muchos piensan, no es una mezcla de tinto y blanco (salvo en casos muy específicos y limitados).

Un rosado seco de la región de Provenza, por ejemplo, es ideal para maridar con sushi, ensaladas mediterráneas, carpaccios o pastas con pesto. Por su parte, los rosados más dulces como el Zinfandel californiano se disfrutan mejor como aperitivo o con postres frutales.

Además, no es un vino solo para días calurosos. Puedes disfrutarlo en cualquier época del año, especialmente si buscas algo ligero y elegante. Su versatilidad lo hace ideal para cenas informales, celebraciones o incluso como vino de bienvenida.

No subestimes al vino rosado: detrás de su color delicado se esconden complejidad, carácter y frescura que te sorprenderán si le das la oportunidad.
EOT,
                'cover_image' => 'images/reviews/3/3b8ab63b-4b27-4a17-b225-fd43f5682a2b.jpg',
                'comments_available' => true,
                'user_id' => 1,
            ],
        ]);

        DB::statement('ALTER SEQUENCE review_id_seq RESTART WITH 4');
    }
}
