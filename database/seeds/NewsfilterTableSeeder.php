<?php

use Illuminate\Database\Seeder;

class NewsfilterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('newsfilters')->delete();
    	
    	$filters = [
    			[
    				'id' => 1,
    				'name' => 'algemeen'
    			],
    			[
    				'id' => 2,
    				'name' => 'vacatures'
    			]
    	];
    	
    	DB::table('newsfilters')->insert($filters);
    	
    }
}
