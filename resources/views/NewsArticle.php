<?php
use App\NewsData;
?>
<html>
<link rel="StyleSheet" href="../../public/css/app.css" />

<body>

	<div class="container">

		<div class="row">
				<?php
				
				if ($_GET['itemId'] !== null && ctype_digit($_GET['itemId'])) {
					
					$itemNr = $_GET['itemId'];
					
					require '../../app/NewsData.php';
					require '../../app/NewsItem.php';
					
					$newsData = new NewsData();
					$newsItem = $newsData->getNewsItem($itemNr);
					
					if ($newsItem !== null) {
						
						$text = $newsItem->getText();
						
						echo "<div class=\"col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1\">";
						
						echo $text;
						
						echo "</div>";
						
						echo "<div class=\"col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1\">";
						
						$paths = $newsItem->getPaths();
						$titles = $newsItem->getPictureName();
						
						for($i = 0; $i < 99; $i ++) {
							
							if (isset($paths[$i])) {
								$pictureName = $paths[$i];
								
								echo "<img src=\"../assets/Images/NewsImages/$pictureName\" style=\"width: 100%;\">";
								
								if (isset($titles[$i])) {
									
									$title = $titles[$i];
									
									echo "<br>";
									
									echo $title;
								}
							} else {
								break;
							}
						}
						
						echo "</div>";
					} else {
						
						echo "<div class=\"col-lg-12 col-md-12 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1\">";
						
						echo "<h1>Dit item bestaat niet (meer)</h1>";
						
						echo "</div>";
					}
				} else {
					
					echo "<div class=\"col-lg-12 col-md-12 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1\">";
					
					echo "<h1>Oops something went wrong</h1>";
					
					echo "</div>";
				}
				
				?>
			</div>


	</div>
</body>

</html>