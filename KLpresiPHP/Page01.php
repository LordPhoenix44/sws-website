<!DOCTYPE html>

<html>
	<head>
		<title>Verteidigung P 01</title>
		<meta charset ="utf-8">
		<link rel="stylesheet" href="styleX.css" type="text/css">
	</head>	
	<body>
		<div id="wrapper">
			<p>KL PHP Verteidigung</p>
			<?php
				
			?>
			<a href="Page02.php" class="weg"><p>Nächste Seite</p></a>
		</div>
		<aside id="code">
			<?php
				echo htmlspecialchars('<p>KL PHP Verteidigung</p>');
				echo '<br>  ' . htmlspecialchars('<a href="Page02.php" class="weg"><p>Nächste Seite</p></a>');
			?>
		</aside>
		
	</body>
</html>
 