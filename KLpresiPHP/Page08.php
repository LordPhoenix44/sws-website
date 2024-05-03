<!DOCTYPE html>

<html>
	<head>
		<title>Verteidigung P 08</title>
		<meta charset ="utf-8">
		<link rel="stylesheet" href="styleX.css" type="text/css">
	</head>	
	<body>
		<div id="wrapper">
			<p>register.php</p>
			<a href="../home.php" class="weg" target="_blank"><p>Zur Website</p></a>
			<a href="Page09.php" class="weg"><p>Nächste Seite</p></a>
		</div>
		<aside id="code">
			<?php
				echo htmlspecialchars('<?php');
				echo '<br>' . htmlspecialchars('|include "includes/define_con.php";');
				echo '<br>' . htmlspecialchars('?>');
				echo '<br>' . htmlspecialchars('<div class="login-box">');
				echo '<br>' . htmlspecialchars('|<h1>Registrierung</h1>');
				echo '<br>' . htmlspecialchars('|<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">');
				echo '<br>' . htmlspecialchars('||<div class="textbox">');
				echo '<br>' . htmlspecialchars('|||<input type="text" name="name" placeholder="Name" required>');
				echo '<br>' . htmlspecialchars('||</div>');
				echo '<br>' . htmlspecialchars('||<div class="textbox">');
				echo '<br>' . htmlspecialchars('|||<input type="text" name="email" placeholder="E-Mail" required>');
				echo '<br>' . htmlspecialchars('||</div>');
				echo '<br>' . htmlspecialchars('||<div class="textbox">');
				echo '<br>' . htmlspecialchars('|||<input type="text" name="pwrd" placeholder="Neues Passwort" required>');
				echo '<br>' . htmlspecialchars('||</div>');
				echo '<br>' . htmlspecialchars('||<input type="submit" class="btn">');
				echo '<br>' . htmlspecialchars('||<a href="login.php"><button type="button" class="btn">Zum Login</button></a>');
				echo '<br>' . htmlspecialchars('||<a href="home.php"><button type="button" class="btn">Zurück zur Startseite</button></a>');
				echo '<br>' . htmlspecialchars('|</form>');
				echo '<br>' . htmlspecialchars('</div>');
				echo '<br>' . htmlspecialchars('<?php');
				echo '<br>' . htmlspecialchars('|$checkmail = 0;');
				echo '<br>' . htmlspecialchars('|$hashedpw = hash("sha512", $_POST["pwrd"]);');
				echo '<br>' . htmlspecialchars('|$sql = $con->prepare("INSERT INTO user3 (Name, Passwort, Email, Verifiziert) VALUES (?, ?, ?, ?)");');
				echo '<br>' . htmlspecialchars('|$sql->bind_param("sssi", $_POST["name"], $hashedpw, $_POST["email"], $checkmail);');
				echo '<br>' . htmlspecialchars('|if(strlen($_POST["name"]) > 0 and strlen($_POST["pwrd"]) > 0 and filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {');
				echo '<br>' . htmlspecialchars('||if($_POST["email"] != str_replace("@mail.kreuzgymnasium.de","",$_POST["email"])) {');
				echo '<br>' . htmlspecialchars('|||$checkmail = 1;');
				echo '<br>' . htmlspecialchars('||}');
				echo '<br>' . htmlspecialchars('||$sql->bind_param("sssi", $_POST["name"], $hashedpw, $_POST["email"], $checkmail);');
				echo '<br>' . htmlspecialchars('||$sql->execute();');
				echo '<br>' . htmlspecialchars('|}');
				echo '<br>' . htmlspecialchars('?>');
				echo '<br>' . htmlspecialchars('</div>');
				
			?>
		</aside>
		
	</body>
</html>
 