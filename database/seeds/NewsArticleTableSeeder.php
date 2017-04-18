<?php

use Illuminate\Database\Seeder;

class NewsArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_articles')->delete();

        $news_articles = array(
            array (
                'id' => 1,
                'title' => "Textile Fascinated",
                'description' => "Nieuwsartikel over Textile Fascinated",
                'text' => "Het begon met textiel, een fascinatie van alle deelnemende kunstenaars illustratoren en ontwerpers. Het doel was een manier te ontwikkelen om je gevoel voor kleur, vorm en texturen afgebeeld te krijgen.
                           De eerste lessenreeks werd afgesloten met een grote stapel van monsters, van interessant prachtig tot lelijk saai. Daarna werd het tijd om iets groters en doordachts te maken; iets dat zou voelen als een eindwerk. Een werk waarin alle nieuwe inzichten en technieken worden gebruikt. 
                           Het resultaat is prachtig vrouwelijk en gevoelig werk dat gewoonweg geëxposeerd moet worden. In de tentoonsetlling is werk te zien van Kelly Geurts, Maud Rijken, Petry Sonnemans, Sonja de Jong, Sophie Gruijters en Saskia Joosten. 
                           Locatie: Spiegelzaal en in de werkplaats van Grafisch Atelier Den Bosch (1ste verdieping)",
                'date' => '2017-04-10',
                'visible' => 1
            ),
            array (
                'id' => 2,
                'title' => "Vrijwillgersvacatures GA Den Bosch",
                'description' => "Alle vacatures van het Grafisch Atelier",
                'text' => "Het Grafisch Atelier Den Bosch is een werkplaats waar geexperimenteerd kan worden met de grafische technieken. Een plek, in de Willem Twee, waar kunstenaars, vormgevers, studenten, scholieren, amateurs en andere geinteresseerden zelfstandig kunnen werken, cursussen en workshops kunnen volgen en exposities komen bekijken. 
                Het atelier is zes dagen per week geopend en dit zou niet mogelijk zijn zonder de inzet van onze vrijwilligers. Om de gasten zo goed mogelijk van dienst te kunnen zijn zouden wij ons vrijwilligersteam graag uitbreiden met een aantal oproepkrachten en een vrijwilliger marketing & communicatie.",
                'date' => '2017-02-15',
                'visible' => 1
            )
        );

        DB::table('news_articles')->insert($news_articles);
    }


}