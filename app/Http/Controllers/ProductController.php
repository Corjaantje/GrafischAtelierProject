<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('webshop', compact('products'));
    }
	
	public function newProduct(Request $request)
	{		
		if(!$this->formValid()){
					
			return Redirect::to('cms/product_lijst');
					
		}
		$this->validate($request, [
				'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);
		$imageName = $request->Image->getClientOriginalName();
		
		$request->Image->move(public_path('img\Producten'), $imageName);
		
		Product::Insert(['name' => $_POST['Name'], 'price' =>$_POST['Price'], 'description' => $_POST['Description'], 'image' => $imageName ]);
		
		return Redirect::to('cms/product_lijst');
	}
	
	public function editProduct(Request $request)
	{
		if(!$this->formValid()){
				
			return Redirect::to('cms/product_lijst');
				
		}
		var_dump($request->Image);
		$this->validate($request, [
				'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);
		$imageName = $request->Image->getClientOriginalName();
		
		$request->Image->move(public_path('img\Producten'), $imageName);
		
		Product::Where('id', '=', $_POST['Id'])->update(['name' => $_POST['Name'], 'price' =>$_POST['Price'], 'description' => $_POST['Description'], 'image' => $imageName ]);
		
		return Redirect::to('cms/product_lijst');
	}
	
	private function formValid()
	{		
		$isValid = true;
		
		if(!isset($_POST['Name'])){
			$isValid = false;
		}
		
		if(!isset($_POST['Price'])){
			$isValid = false;
		} else {
			
			if($_POST['Price'] == ''){
				$isValid = false;
			}
			
		}
		
		if(!isset($_POST['Description'])){
			$isValid = false;
		}
		
		return $isValid;
	}
	
	public function getFormData($id = -1)
	{				
		$data['name'] = "";
		$data['price'] = "0";
		$data['description'] = "";
		
		if($id != -1){
			
			$product = Product::find($id);
			
			if($product != null){
				
				$data['name'] = $product->name;
				$data['price'] = $product->price;
				$data['description'] = $product->description;
				
			}
			
		}
		
		return $data;
	}
	
	public function removeItem($id)
	{		
		Product::Where('ID', '=', $id)->Delete();
		
		return redirect('cms/product_lijst');
	}
	
}
