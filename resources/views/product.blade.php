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
		@include('layouts.header', array('title'=>'product'))


		<div class="container">
			@php
			
			echo "<div class=\"row\">";
			
			if ($Id !== null) {		
									
				$product = App\Product::find($Id);
				$name = $product->name;
				$price = $product->price;
				$description = $product->description;
				
				echo "<h3>$name</h3>";

				echo "<div class=\"col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1\" >";
				
				echo "<img src=\"../img/WebshopImages/Shop$Id.jpg\" style=\"width: 50%;\">";
				
				echo "</div>";

				echo "<div class=\"col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1\" >";
				
				echo "<br> <p>$price</p> <br>";
				
				echo "<p>$description</p>";
				
				echo "</div>";
				
			} else {
				echo "<h3>Product niet gevonden</h3>";
			}
			
			echo "</div>";
			
			echo "</div>";
			
			@endphp
		
		</div>
		@include('layouts.footer')
	</body>

</html>