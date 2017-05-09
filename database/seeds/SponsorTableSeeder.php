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
                'name' => "Willem II fabriek",
                'image' => "w2.png",
                'sponsor_url' => "https://www.willem-twee.nl/"
            )
        );

        DB::table('sponsors')->insert($sponsors);
    }
}
