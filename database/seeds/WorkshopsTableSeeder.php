<?php

use Illuminate\Database\Seeder;

class WorkshopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workshops')->delete();

        $workshops = array(
            array(
                'id' => 1,
                'title' => 'Watervrije non toxische Lithografie',
                'description' => 'door Ingrid Menge',
                'text' => 'Nik Semenoff heeft deze techniek uitgewerkt tot een volwaardige druktechniek zonder gebruik van water en als extra bijkomend voordeel; zonder schadelijke zuren. Het materiaal waarop getekend wordt is licht en goedkoop en kan afgedrukt worden onder een etspers.',
                'visible' => 1,
	            'start_date' => new DateTime('2017-3-10 9:30:0'),
	            'end_date' => new DateTime('2017-3-10 16:00:0'),
                'cost' => 0,
                'template' => 1,
            ),
            array(
                'id' => 2,
                'title' => 'Boekbinden',
                'description' => 'door Truzanne Lousberg',
                'text' => 'Het boekbinden is een prachtige maar al bijna vergeten techniek. In deze workshop leert u zelf boeken te binden, katernen te maken, de looprichting van het papier te herkennen en prachtige omslagen te maken. Aan het einde van de workshop gaat u naar huis met een prachtig boekje met harde kaft.',
                'visible' => 1,
	            'start_date' => new DateTime('2017-5-27 9:0:0'),
	            'end_date' => new DateTime('2017-5-27 16:30:0'),
                'cost' => 0,
                'template' => 1,
            ),
            array(
                'id' => 3,
                'title' => 'Kitchenlitho',
                'description' => 'door Hannah de Haan',
                'text' => 'Kitchen-litho is een nieuwe manier van litho\'s (vlakdruk) maken: goedkoop, non-toxic, niet moeilijk en vooral heel erg leuk. De keuken-litho is gebaseerd op het principe van de lithografie, een techniek waarbij vet en water elkaar afstoten. Met alledaagse huishoudelijke middelen kan je een kunstwerkje, kaartjes, uitnodigingen, etc maken.',
                'visible' => 1,
	            'start_date' => new DateTime('2017-3-18 10:0:0'),
	            'end_date' => new DateTime('2017-3-18 13:0:0'),
                'cost' => 0,
                'template' => 1,
            ),
            array(
                'id' => 4,
                'title' => 'Basiscursus zeefdruk',
                'description' => '',
                'text' => 'Deze workshop is bedoeld voor iedereen die wil leren zeefdrukken. Voor kunstenaars en vormgevers, maar ook voor eenieder die zelfstandig tasjes, posters of ansichtkaarten wil kunnen drukken.',
                'visible' => 1,
	            'start_date' => new DateTime('2017-3-22 10:0:0'),
	            'end_date' => new DateTime('2017-3-22 16:0:0'),
                'cost' => 0,
                'template' => 1,
            ),
            array(
                'id' => 5,
                'title' => 'Cyanotype',
                'description' => 'door Rens Horn',
                'text' => 'In 1842 ontdekte de Engelse fotopionier Sir John Herschel een oplossing van twee ijzerzouten die na droging lichtgevoelig is. Door belichting vormen deze twee ijzerzouten een onoplosbare.',
                'visible' => 1,
	            'start_date' => new DateTime('2017-5-13 10:0:0'),
	            'end_date' => new DateTime('2017-5-13 12:30:0'),
                'cost' => 0,
                'template' => 1,
            )
        );
        DB::table('workshops')->insert($workshops);
    }
}
