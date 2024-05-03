<!DOCTYPE html>

<html>
	<head>
		<title>Verteidigung P 03</title>
		<meta charset ="utf-8">
		<link rel="stylesheet" href="styleX.css" type="text/css">
	</head>	
	<body>
		<div id="wrapper">
			<p>Variablen</p>
			<?php
				$Zahl1 = 3;
				$Zahl2 = 3.5;
				$bool = true;
				var_dump($Zahl1);
				echo "<br>";
				var_dump($Zahl2);
				echo "<br>";
				var_dump($bool);
				echo "<br>";
				var_dump($_SERVER["REMOTE_ADDR"]);
			?>
			<a href="Page04.php" class="weg"><p>Nächste Seite</p></a>
		</div>
		<aside id="code">
			<?php
				echo htmlspecialchars('<p>Variablen</p>');
				echo '<br>' . htmlspecialchars('<?php');
				echo '<br>' . htmlspecialchars('  $Zahl1 = 3;');
				echo '<br>' . htmlspecialchars('  $Zahl2 = 3.5;');
				echo '<br>' . htmlspecialchars('  $bool = true;');
				echo '<br>' . htmlspecialchars('  var_dump($Zahl1);');
				echo '<br>' . htmlspecialchars('  var_dump($Zahl2);');
				echo '<br>' . htmlspecialchars('  var_dump($bool);');
				echo '<br>' . htmlspecialchars('  var_dump($_SERVER["REMOTE_ADDR"]);');
				echo '<br>' . htmlspecialchars('?>');
			?>
		</aside>
		
	</body>
</html>
 