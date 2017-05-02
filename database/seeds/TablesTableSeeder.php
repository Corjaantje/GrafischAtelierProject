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
                'technique_id' => 2,

            )
        );

        DB::table('tables')->insert($tables);
    }
}
