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
        
        DB::table('products')->delete();
        
        $products = array(
        		array(
        				'id' => 1,
        				'name' => "Het eerste product",
        				'price' => 12.40,
        				'description' => "Dit is een product voor de database. Dit product is alleen een testproduct en dient meteen weggegooid te worden"
        		),
        		array(
        				'id' => 2,
        				'name' => "Het tweede product",
        				'price' => 40.12,
        				'description' => "Dit is een product voor de database. Dit product is alleen een testproduct en dient meteen weggegooid te worden"
        		)
        );
        
        DB::table('products')->insert($products);
    }
}
