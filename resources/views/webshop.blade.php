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
				$productPrice = $product->price;
				$productDescription = $product->description;
				$fileName = "img/WebshopImages/Shop$productnr.jpg";
					
				echo "<div class=\"col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1\" >";
				
				echo "<img src=\"$fileName\" style=\"width: 100%;\" data-toggle='modal' data-target=\"#$productnr\">";
				
				echo "<br>";
				
				echo "<b>Productnaam</b>: $productTitle";

				echo "<br>";

				echo "<b>Prijs</b>: $productPrice";

				echo "<br>";

				echo "<b>Beschrijving</b>: $productDescription";

				echo "<br>";

				echo "<div class='modal fade' id=\"$productnr\" role='dialog'>";
					echo "<div class='modal-dialog'>";
						echo "<div class='modal-content'>";
							echo "<div class='modal-header'>";
								echo "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
								echo "<h4 class='modal-title'>\"$productTitle\"</h4>";
							echo "</div>";
							echo "<div class='modal-body'>";
								echo "<img src=\"$fileName\">";
							echo "</div>";
							echo "<div class='modal-footer'>";
								echo "<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
							echo "</div>";
						echo "</div>";
					echo "</div>";
				echo "</div>";

				echo "</div>";
			}

			echo "</div>";

			@endphp
		
		</div>
	
		@include('layouts.footer')
	</body>

</html>
