<?php
use App\NewsData;

?>
<html>

<link rel="stylesheet" href='css/app.css'>
<link rel="stylesheet" type="text/css" href="css/style.css">

<body>
@include('layouts.header', array('title'=>'Nieuws'))
	<div class="container">

		<?php
		
		include '../app/NewsData.php';
		include '../app/NewsItem.php';
		
		$NewsData = new NewsData();
		
		for($x = 0; $x < 8; $x ++) {
			
			echo "<div class=\"row\">";
			
			for($y = 1; $y < 4; $y ++) {
				
				$itemNr = ($x * 3) + $y;
				
				$item = $NewsData->getNewsItem($itemNr);
				
				echo "<div class=\"col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1\" >";
				
				if ($item !== null) {
					$pictureName = $item->getPaths()[0];
					$sample = $item->getSampleText();
					
					echo "<a href=\"artikel/$itemNr\" style=\"text-decoration: none; color:black;\">";
					
					echo "<img src=\"../../img/NewsImages/$pictureName\" style=\"width: 100%;\">";
					
					echo "<br>$sample";
					
					echo "<br>";
					
					echo "<p style=\"color:red;\">LEES VERDER > </p>";
					
					echo "</a>";
					
					echo "</div>";
				} else {
					
					echo "</div>";
					break 2;
				}
			}
			
			echo "</div>";
		}
		echo "</div>";
		?>
		
	</div>
@include('layouts.footer')
</body>

</html>