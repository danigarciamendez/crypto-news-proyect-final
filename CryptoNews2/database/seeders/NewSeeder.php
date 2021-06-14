<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            'title' => 'Bitcoin se hunde',
            'resume' => 'Bitcoin sufre una caida del 10% en dos horas',
            'description' => 'Quinn identificó la volatilidad como una de las principales razones de la decisión del banco, a pesar de la tendencia emergente de otras instituciones financieras importantes que anuncian planes para abrir vías de cripto inversión para sus clientes.\n
            A principios de mayo, el banco de inversión Wells Fargo anunció planes para presentar un producto de inversión en criptomonedas para los principales clientes. Además, otros bancos importantes de EE. UU. como Morgan Stanley y Goldman Sachs se encuentran en varias etapas de implementación de fondos de Bitcoin de grado institucional para sus clientes.',
            'image' => 'noticia1.jpg',
            

        ]);

        DB::table('news')->insert([
            'title' => 'Más se ha oído hablar de Dogecoin que de Ethereum, según revela una encuesta',
            'resume' => 'Una moneda ha introducido los contratos inteligentes y es el tejido de las finanzas descentralizadas, y la otra es... un meme.',
            'description' => 'En poco más de cinco años desde su lanzamiento, Ethereum introdujo al mundo los contratos inteligentes, las finanzas descentralizadas, el yield farming y los tokens no fungibles, y se ha mantenido durante mucho tiempo justo detrás de Bitcoin como el segundo mayor proyecto de blockchain por capitalización de mercado.
            \nDogecoin (DOGE) es una criptomoneda meme que no ha proporcionado ninguna innovación, no tiene ninguna razón de ser real, y solo es popular porque se convirtió en el juguete de un famoso multimillonario durante los últimos 12 meses.',
            'image' => 'noticia2.jpg',
            

        ]);

        DB::table('news')->insert([
            'title' => 'Más se ha oído hablar de Dogecoin que de Ethereum, según revela una encuesta',
            'resume' => 'Una moneda ha introducido los contratos inteligentes y es el tejido de las finanzas descentralizadas, y la otra es... un meme.',
            'description' => 'En poco más de cinco años desde su lanzamiento, Ethereum introdujo al mundo los contratos inteligentes, las finanzas descentralizadas, el yield farming y los tokens no fungibles, y se ha mantenido durante mucho tiempo justo detrás de Bitcoin como el segundo mayor proyecto de blockchain por capitalización de mercado.
            \nDogecoin (DOGE) es una criptomoneda meme que no ha proporcionado ninguna innovación, no tiene ninguna razón de ser real, y solo es popular porque se convirtió en el juguete de un famoso multimillonario durante los últimos 12 meses.',
            'image' => 'noticia2.jpg',

        ]);

        DB::table('news')->insert([
            'title' => 'Más se ha oído hablar de Dogecoin que de Ethereum, según revela una encuesta',
            'resume' => 'Una moneda ha introducido los contratos inteligentes y es el tejido de las finanzas descentralizadas, y la otra es... un meme.',
            'description' => 'En poco más de cinco años desde su lanzamiento, Ethereum introdujo al mundo los contratos inteligentes, las finanzas descentralizadas, el yield farming y los tokens no fungibles, y se ha mantenido durante mucho tiempo justo detrás de Bitcoin como el segundo mayor proyecto de blockchain por capitalización de mercado.
            \nDogecoin (DOGE) es una criptomoneda meme que no ha proporcionado ninguna innovación, no tiene ninguna razón de ser real, y solo es popular porque se convirtió en el juguete de un famoso multimillonario durante los últimos 12 meses.',
            'image' => 'noticia2.jpg',
            

        ]);
    }
}
