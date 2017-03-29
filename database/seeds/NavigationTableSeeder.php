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
                'link' => 'nieuws',
                'parent_id' => 0,
                'visible' => 1
            ),
             array(
                 'id' => 2,
                 'name' => 'Webshop',
                 'link' => 'winkel',
                 'parent_id' => 0,
                 'visible' => 1
             )
        );

        DB::table('header_navigations')->insert($header_navigation);
    }
}
