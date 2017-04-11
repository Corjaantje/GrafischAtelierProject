<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    
	public function insertProduct(){
		
		if($_POST['Id'] == -1){
			$this->newProduct();
		}
		else{
			$this->editProduct();
		}
		
		return redirect('cms/product_lijst');
		
	}
	
	private function newProduct(){
		
		Product::Insert(['Name' => $_POST['Name'], 'Price' =>$_POST['Price'], 'Description' => $_POST['Description'] ]);
	}
	
	private function editProduct(){
		Product::Where('Id', '=', $_POST['Id'])->update(['Name' => $_POST['Name'], 'Price' =>$_POST['Price'], 'Description' => $_POST['Description'] ]);
	}
	
	private function formValid(){
		
		if(!isset($_POST['Id'])){
			return false;
		}
		
		if(!isset($_POST['Name'])){
			
		}
		return true;
	}
	
	public function fillForm($id = -1){
				
		$name = "Naam";
		$price = "0.01";
		$description = "Beschrijving";
		
		if($id != -1){
			
			$product = Product::find($id);
			
			if($product != null){
				
				$name = $product->Name;
				$price = $product->Price;
				$description = $product->Description;
				
			}
			
		}
		
		
		$output = "<input type=\"hidden\" value=\"$id\" name=\"Id\" />
			
						Naam: <input type=\"text\" name=\"Name\" value=\"$name\" size=\"40%\"/> <br>
						Prijs:   <input type=\"number\" name=\"Price\" step=\"0.01\" value=\"$price\"/><br>
						Beschrijving: <br> <textarea name=\"Description\" rows=\"5\" cols=\"60\">$description</textarea><br>
				
						<input type=\"submit\" value=\"Aanmaken\"/>";
		
		return $output;
		
	}
	
	public function removeItem($id){
		
		Product::Where('ID', '=', $id)->Delete();
		
		return redirect('cms/product_lijst');
	}
	
}
