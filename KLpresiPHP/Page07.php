<!DOCTYPE html>

<html>
	<head>
		<title>Verteidigung P 07</title>
		<meta charset ="utf-8">
		<link rel="stylesheet" href="styleX.css" type="text/css">
	</head>	
	<body>
		<div id="wrapper">
			<p>while-Schleife</p>
			<?php
				$Zahl = 1;
				var_dump($Zahl);
				while($Zahl <= 5) {
					$Zahl += 1;
					echo "<br>";
					var_dump($Zahl);
				}
			?>
			<a href="Page08.php" class="weg"><p>Nächste Seite</p></a>
		</div>
		<aside id="code">
			<?php
				echo htmlspecialchars('<p>while-Schleife</p>');
				echo '<br>' . htmlspecialchars('<?php');
				echo '<br>' . htmlspecialchars('  $Zahl = 1;');
				echo '<br>' . htmlspecialchars('  var_dump($Zahl);');
				echo '<br>' . htmlspecialchars('  while($Zahl <= 5) {');
				echo '<br>' . htmlspecialchars('  $Zahl += 1;');
				echo '<br>' . htmlspecialchars('  var_dump($Zahl);');
				echo '<br>' . htmlspecialchars('}');
				echo '<br>' . htmlspecialchars('?>');
			?>
		</aside>
		
	</body>
</html>
 