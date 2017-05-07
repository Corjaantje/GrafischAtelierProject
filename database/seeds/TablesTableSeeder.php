<?php

use Illuminate\Database\Seeder;

class TablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tables')->delete();

        $tables = array(
            array (
                'id' => 1,
                'technique_id' => 1,
            ),
            array (
                'id' => 2,
                'technique_id' => 1,
            ),
            array (
                'id' => 3,
                'technique_id' => 1,
            ),
            array (
                'id' => 4,
                'technique_id' => 1,
            ),
            array (
                'id' => 5,
                'technique_id' => 1,
            ),
            array (
                'id' => 6,
                'technique_id' => 2,
            ),
            array (
                'id' => 7,
                'technique_id' => 3,
            ),
            array (
                'id' => 8,
                'technique_id' => 3,
            )
        );

        DB::table('tables')->insert($tables);
    }
}
