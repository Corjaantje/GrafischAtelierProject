<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->delete();

        $tables = array(
            array (
                'id' => 1,
                'name' => "Cyanotype",
                'description' => "In 1842 ontdekte de Engelse fotopionier Sir John Herschel een oplossing van twee ijzerzouten die na droging lichtgevoelig is. Door belichting vormen deze twee ijzerzouten een onoplosbare ijzerverbinding met een kenmerkende blauwe kleur: de cyanotype.",
                'coursegiver_name' => "Rens Horn",
                'max_signups' => 10,
                'price' => 75.00,
                'start_date' => "2017-05-13 13:30:00",
                'end_date' => "2017-05-13 16:00:00",
                'visible' => 1,
            ),
            array (
                'id' => 2,
                'name' => "Boekbinden",
                'description' => "Het boekbinden is een prachtige maar al bijna vergeten techniek. In deze workshop leer je de basistechniek van het boekbinden, katernen samen stellen, de looprichting van het papier herkennen, de traditionele bindwijze met boekbindersgaren, het maken van schutbladen, het bevestigen van de kaft en prachtige omslagen maken. Aan het einde van de workshop ben je in staat om thuis én in het Grafisch Atelier zelfstandig boeken te binden. ",
                'coursegiver_name' => "Truzanne Lousberg",
                'max_signups' => 10,
                'price' => 110.00,
                'start_date' => "2017-05-27 09:00:00",
                'end_date' => "2017-05-27 16:30:00",
                'visible' => 1,
            ),
        );

        DB::table('courses')->insert($tables);
    }
}
