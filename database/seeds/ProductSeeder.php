<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('Products')->delete();
        
        $products = array(
        		array(
        				'ID' => 1,
        				'Name' => "Het eerste product",
        				'Price' => 12.40,
        				'Description' => "Dit is een product voor de database. Dit product is alleen een testproduct en dient meteen weggegooid te worden"
        		),
        		array(
        				'ID' => 2,
        				'Name' => "Het tweede product",
        				'Price' => 40.12,
        				'Description' => "Dit is een product voor de database. Dit product is alleen een testproduct en dient meteen weggegooid te worden"
        		)
        		
        );
        
        DB::table('products')->insert($products);
    	
    }
}
