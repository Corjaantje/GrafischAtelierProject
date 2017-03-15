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
		@include('layouts.headerChild', array('title'=>'product'))


		<div class="container">
			<?php
			require '../app/ShopItemNames.php';
			$y = new ShopItemNames();
			
			echo "<div class=\"row\"";
			
			echo "<div class=\"col-lg-8 col-md-8 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1\" >";
			
			if ($Id !== null) {
				
				$var = intval($Id);
				
				$title = $y->getNames()[$var];
				
				echo "<img src=\"../img/WebshopImages/Shop$var.jpg\" style=\"width: 50%;\">";
				
				echo "<h3>$title</h3>";
			} else {
				echo "<h3>Product niet gevonden</h3>";
			}
			
			echo "<p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>";
			
			echo "</div>";
			
			echo "</div>";
			
			?>	
		
		</div>
		@include('layouts.footerChild')
	</body>

</html>