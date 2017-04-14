<?php
use App\ShopItemNames;
?>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
	<script src="{{ URL::asset('js/app.js') }}"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
	<body>
	
		@include('layouts.header', array('title'=>'webshop'))
	
		<div class="container">
		
			@php


			echo "<div class=\"row\">";
			
			$products = App\Product::all();
			
			foreach($products as $product){
				
				$productnr = $product->id;
				
				$productTitle = $product->name;
				
				$fileName = "img/WebshopImages/Shop$productnr.jpg";
					
				echo "<div class=\"col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1\" >";
				
				echo "<a href=\"product/$productnr\">";
				
				echo "<img src=\"$fileName\" style=\"width: 100%;\">";
				
				echo "<br>";
				
				echo "$productTitle";
				
				echo "</a>";
				
				echo "</div>";
				
				
			}
			
			
			
			echo "</div>";
				
			
			@endphp
		
		</div>
	
		@include('layouts.footer')
	</body>

</html>
