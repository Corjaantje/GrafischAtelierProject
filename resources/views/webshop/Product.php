<html>


	<link rel="stylesheet" href="../../../public/css/app.css">

	<body>


		<div class="container">
			<?php 
		
				echo "<div class=\"row\"";
			
				echo "<img src=\"../Images/WebshopImages/EmptyFrame.jpg\">";
				
				
				if($_GET['value'] !== null){
					$var = $_GET['value'];
					echo "<h3>Dit is product nummer {$var}</h3>";
				
				}else{
					echo "<h3>Product niet gevonden</h3>";
				}
				
				echo "<p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>";
				
				echo "</div>";
			
			?>	
		
		</div>
	
	</body>

</html>