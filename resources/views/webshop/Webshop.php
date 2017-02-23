<html>

	<link rel="stylesheet" href="../../../public/css/app.css">

	<body>
	
		<div class="container">
		
			<?php 
			
				for ($x = 1; $x < 7; $x++){
					
					echo "<div class=\"row\">";
					
					for($y = 1; $y < 4; $y++){
						
						$productnr = $x + $y;
						
						echo "<div class=\"col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1\" >";
						
						echo "<a href=\"Product.php?value=$productnr\">";
						
						echo "<img src=\"../../assets/Images/WebshopImages/EmptyFrame.jpg\" style=\"width: 100%;\">";
						
						echo "<br>";
						
						echo "Product nr $productnr</a>";
						
						echo "</div>";
						
					}
					
					echo "</div>";
					
				}
			
			?>
		
		</div>
	
	</body>

</html>
