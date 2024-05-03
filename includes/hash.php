<!DOCTYPE html>

<html>
	<head>
		<title>Hash-Teller</title>
		<meta charset ="utf-8">
		<link rel="stylesheet" href="../style_db1.css" type="text/css">
	</head>	
	<body>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<input type="password" name="pwtohash" placeholder="Passwort">
			<input type="submit" class="btn">
		</form>
		<div id="wrapper">
			<?php
				if(isset($_POST["pwtohash"])) {
					echo hash("sha512", $_POST["pwtohash"]);
				}
			?>
		</div>
	</body> 
</html>
 