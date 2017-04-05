<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    
	public function insertProduct(){
		
		if($_POST['Id'] == -1){
			newProduct();
		}
		else{
			editProduct();
		}
		
		header("location: product_lijst");
		
	}
	
	private function newProduct(){
		Product::Insert(['Name' => $_POST['Name'], 'Price' =>$_POST['Price'], 'Description' => $_POST['Description'] ]);
	}
	
	private function editProduct(){
		
	}
	
	private function formValid(){
		
		if(!isset($_POST['Id'])){
			return false;
		}
		
		if(!isset($_POST['Name'])){
			
		}
		return true;
	}
	
	public function getAllProducts(){
		
		$products = Product::all();
		
		$output = "";
		
		foreach ($products as $product){
			
			$id = $product->ID;
			$name = $product->Name;
			$price = $product->Price;
			
			
			$output .= "<div class=\"col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1\" >";
			
			$output .= "<a href=\"productbewerker/$id\">";
			
			$output .= "<img src=\"../img/WebshopImages/Shop$id.jpg\"/ width=\"100%\"><br>";
			
			$output .= "<h3>$name</h3> <br>";
			
			$output .= "<h5>Prijs:  $price </h5>";

			$output .= "</a>";
			
			$output .= "</div>";
			
		}
		
		$output .= "<div class=\"col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1\" >";
			
		$output .= "<a href=\"productbewerker\">";
			
		$output .= "<img src=\"../img/WebshopImages/EmptyFrame.jpg\"/ width=\"100%\"><br>";
			
		$output .= "<h3>Nieuw Product</h3> <br>";

		$output .= "</a>";
			
		$output .= "</div>";
		
		return $output;
		
	}
	
	
}
