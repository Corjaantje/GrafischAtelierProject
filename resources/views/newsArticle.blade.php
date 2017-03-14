<?php
use App\NewsData;
?>
<html>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
<script src="{{ URL::asset('js/app.js') }}"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
@include('layouts.header', array('title'=>'Artikel'))

	<div class="container">

		<div class="row">
			<?php
				
				if ($Id !== null && ctype_digit($Id)) {
					
					$itemNr = intval($Id);

					require '../app/NewsData.php';
					require '../app/NewsItem.php';

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
			
								echo "<img src=\"../img/NewsImages/$pictureName\" style=\"width: 100%;\">";
			
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
@include('layouts.footer')
</body>

</html>