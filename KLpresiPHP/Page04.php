<!DOCTYPE html>

<html>
	<head>
		<title>Verteidigung P 04</title>
		<meta charset ="utf-8">
		<link rel="stylesheet" href="styleX.css" type="text/css">
	</head>	
	<body>
		<div id="wrapper">
			<p>Rechenoperatoren</p>
			<?php
				$Zahl = 3;
				$Ergebnis1 = $Zahl * 2;
				var_dump($Ergebnis1);
				echo "<br>";
				var_dump($Zahl);
				$Zahl = $Zahl + 1;
				echo "<br>";
				var_dump($Zahl);
			?>
			<a href="Page05.php" class="weg"><p>Nächste Seite</p></a>
		</div>
		<aside id="code">
			<?php
				echo htmlspecialchars('<p>Rechenoperatoren</p>');
				echo '<br>' . htmlspecialchars('<?php');
				echo '<br>' . htmlspecialchars('  $Zahl = 3;');
				echo '<br>' . htmlspecialchars('  $Ergebnis1 = $Zahl * 2;');
				echo '<br>' . htmlspecialchars('  var_dump($Ergebnis1);');
				echo '<br>' . htmlspecialchars('  var_dump($Zahl);');
				echo '<br>' . htmlspecialchars('  $Zahl = $Zahl + 1;');
				echo '<br>' . htmlspecialchars('  var_dump($Zahl);');
				echo '<br>' . htmlspecialchars('?>');
			?>
		</aside>
		
	</body>
</html>
 