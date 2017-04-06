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
                'priority' => 6,
                'visible' => 1
            ),
            array(
                'id' => 2,
                'name' => 'Webshop',
                'link_as' => 'winkel',
                'parent_id' => null,
                'priority' => 5,
                'visible' => 1
            ),
            array(
                'id' => 3,
                'name' => 'Aan de slag',
                'link_as' => 'aan_de_slag',
                'parent_id' => null,
                'priority' => 4,
                'visible' => 1
            ),
            array(
                'id' => 4,
                'name' => 'Aan de slag',
                'link_as' => 'aan_de_slag',
                'parent_id' => 3,
                'priority' => 105,
                'visible' => 1
            ),
            array(
                'id' => 5,
                'name' => 'Scholen',
                'link_as' => 'scholen',
                'parent_id' => 3,
                'priority' => 104,
                'visible' => 1
            ),
            array(
                'id' => 6,
                'name' => 'Dagje uit',
                'link_as' => 'dagje_uit',
                'parent_id' => 3,
                'priority' => 103,
                'visible' => 1
            ),
            array(
                'id' => 7,
                'name' => 'Opfrissen',
                'link_as' => 'opfrissen',
                'parent_id' => 3,
                'priority' => 102,
                'visible' => 1
            ),
            array(
                'id' => 8,
                'name' => 'Werkplaats',
                'link_as' => 'werkplaats',
                'parent_id' => 3,
                'priority' => 101,
                'visible' => 1
            ),
            array(
                'id' => 9,
                'name' => 'Over ons',
                'link_as' => 'about',
                'parent_id' => null,
                'priority' => 3,
                'visible' => 1
            ),
            array(
                'id' => 10,
                'name' => 'Agenda',
                'link_as' => 'agenda',
                'parent_id' => null,
                'priority' => 2,
                'visible' => 1
            ),
            array(
                'id' => 11,
                'name' => 'Archief',
                'link_as' => 'archief',
                'parent_id' => null,
                'priority' => 1,
                'visible' => 1
            )

        );

        DB::table('header_navigations')->insert($header_navigation);
    }
}
