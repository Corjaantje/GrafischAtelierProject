<?php

use Illuminate\Database\Seeder;

class SponsorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sponsors')->delete();

        $sponsors = array(
            array(
                'id' => 1,
                'name' => "Willem II Fabriek",
                'image' => "w2f_logo.png",
                'sponsor_url' => "https://www.willem-twee.nl/"
            )
        );

        DB::table('sponsors')->insert($sponsors);
    }
}
