<?php 
use App\ShopItemNames;
?>
<html>


	<link rel="stylesheet" href="../../../public/css/app.css">

	<body>


		<div class="container">
			<?php 
				require '../../../app/ShopItemNames.php';
				$y = new ShopItemNames();
			
				echo "<div class=\"row\"";
			
				echo "<img src=\"../Images/WebshopImages/EmptyFrame.jpg\">";

				echo "<div class=\"col-lg-8 col-md-8 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1\" >";
				
				if($_GET['value'] !== null){
					
					$var = $_GET['value'];
					
					$title = $y->getNames()[$var];
					
					echo "<img src=\"../../assets/Images/WebshopImages/Shop$var.jpg\" style=\"width: 100%;\">";
					
					echo "<h3>$title</h3>";
				
				}else{
					echo "<h3>Product niet gevonden</h3>";
				}
				
				echo "<p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>";

				echo "</div>";
				
				echo "</div>";
			
			?>	
		
		</div>
	
	</body>

</html>