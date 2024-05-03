<!DOCTYPE html>

<html>
	<head>
		<title>Verteidigung P 06</title>
		<meta charset ="utf-8">
		<link rel="stylesheet" href="styleX.css" type="text/css">
	</head>	
	<body>
		<div id="wrapper">
			<p>if-Bedingung</p>
			<?php
				$Zahl = 3;
				$String = "Hallo Welt";
				var_dump($Zahl);
				if($Zahl <= 4 OR $String == "Hello World") {
					$Zahl += 1;
					echo "<br>";
					var_dump($Zahl);
				}
			?>
			<a href="Page07.php" class="weg"><p>Nächste Seite</p></a>
		</div>
		<aside id="code">
			<?php
				echo htmlspecialchars('<p>if-Bedingung</p>');
				echo '<br>' . htmlspecialchars('<?php');
				echo '<br>' . htmlspecialchars('  $Zahl = 3;');
				echo '<br>' . htmlspecialchars('  $String = "Hallo Welt";');
				echo '<br>' . htmlspecialchars('  var_dump($Zahl);');
				echo '<br>' . htmlspecialchars('  if($Zahl <= 4 OR $String == "Hello World") {');
				echo '<br>' . htmlspecialchars('  $Zahl += 1;');
				echo '<br>' . htmlspecialchars('  var_dump($Zahl);');
				echo '<br>' . htmlspecialchars('}');
				echo '<br>' . htmlspecialchars('?>');
			?>
		</aside>
		
	</body>
</html>
 