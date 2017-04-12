<?php

use Illuminate\Database\Seeder;

class TechniquesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('techniques')->delete();

        $techniques = array(
            array (
                'id' => 1,
                'name' => "Zeefdruk",
                'description' => "Er zijn 5 zeefdruktafels met vacuümafzuiging: een zeefdruktafel voor maximaal A1 formaat, 
                 drie tafels voor A2 formaat en een tafel voor A3 formaat. Verder hebben we een grote collectie zeeframen in allerlei formaten."
            ),
            array (
                'id' => 2,
                'name' => "Steendruk",
                'description' => "De lithopers van het GA is een handaangedreven mechanische pers, 
                 met een druktafel van 80 x 120 cm. Er zijn zo’n 50 lithostenen aanwezig, van diverse maten."
            ),
            array (
                'id' => 3,
                'name' => "Cyanotype & gomdruk",
                'description' => "Voor het maken van cyanotype en gomdruk hebben wij een mooie DOKA, belichter en diverse papieren."
            )
        );

        DB::table('techniques')->insert($techniques);
    }
}
