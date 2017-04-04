<?php

use Illuminate\Database\Seeder;

class NavigationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('header_navigations')->delete();

        $header_navigation = array(
            array(
                'id' => 1,
                'name' => 'Nieuws',
                'link_as' => 'nieuws',
                'parent_id' => null,
                'visible' => 1
            ),
            array(
                'id' => 2,
                'name' => 'Webshop',
                'link_as' => 'winkel',
                'parent_id' => null,
                'visible' => 1
            ),
            array(
                'id' => 3,
                'name' => 'aan_de_slag',
                'link_as' => 'aan_de_slag',
                'parent_id' => null,
                'visible' => 1
            ),
            array(
                'id' => 4,
                'name' => 'aan_de_slag',
                'link_as' => 'aan_de_slag',
                'parent_id' => 3,
                'visible' => 1
            ),
            array(
                'id' => 5,
                'name' => 'scholen',
                'link_as' => 'scholen',
                'parent_id' => 3,
                'visible' => 1
            ),
            array(
                'id' => 6,
                'name' => 'dagje_uit',
                'link_as' => 'dagje_uit',
                'parent_id' => 3,
                'visible' => 1
            ),
            array(
                'id' => 7,
                'name' => 'opfrissen',
                'link_as' => 'opfrissen',
                'parent_id' => 3,
                'visible' => 1
            ),
            array(
                'id' => 8,
                'name' => 'werkplaats',
                'link_as' => 'werkplaats',
                'parent_id' => 3,
                'visible' => 1
            ),
            array(
                'id' => 9,
                'name' => 'over_ons',
                'link_as' => 'about',
                'parent_id' => null,
                'visible' => 1
            ),
            array(
                'id' => 10,
                'name' => 'agenda',
                'link_as' => 'agenda',
                'parent_id' => null,
                'visible' => 1
            ),
            array(
                'id' => 11,
                'name' => 'archief',
                'link_as' => 'archief',
                'parent_id' => null,
                'visible' => 1
            )

        );

        DB::table('header_navigations')->insert($header_navigation);
    }
}
