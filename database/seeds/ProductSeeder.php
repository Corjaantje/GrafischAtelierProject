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
        				'description' => "testproduct voor showcasing",
						'image' => "imgTemp1.jpg"
        		),
        		array(
        				'id' => 2,
        				'name' => "Het tweede product",
        				'price' => 40.12,
        				'description' => "testproduct voor showcasing",
						'image' => "imgTemp2.jpg"
        		)
        );
        
        DB::table('products')->insert($products);
    }
}
