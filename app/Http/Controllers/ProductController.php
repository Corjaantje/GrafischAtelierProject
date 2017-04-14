<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    
	public function insertProduct(){
		
		if(!$this->formValid()){
			
			return redirect('cms/product_lijst');
			
		}
		
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
		
		$isValid = true;
		
		if(!isset($_POST['Id'])){
			$isValid = false;
		}
		
		if(!isset($_POST['Name'])){
			$isValid = false;
		}
		
		if(!isset($_POST['Price'])){
			$isValid = false;
		}
		
		if(!isset($_POST['Description'])){
			$isValid = false;
		}
		
		return $isValid;
	}
	
	public function getFormData($id = -1){
				
		$data['name'] = "";
		$data['price'] = "0";
		$data['description'] = "";
		
		if($id != -1){
			
			$product = Product::find($id);
			
			if($product != null){
				
				$data['name'] = $product->Name;
				$data['price'] = $product->Price;
				$data['description'] = $product->Description;
				
			}
			
		}
		
		return $data;
		
	}
	
	public function removeItem($id){
		
		Product::Where('ID', '=', $id)->Delete();
		
		return redirect('cms/product_lijst');
	}
	
}
