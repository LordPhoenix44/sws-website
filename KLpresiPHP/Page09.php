<!DOCTYPE html>

<html>
	<head>
		<title>Verteidigung P 09</title>
		<meta charset ="utf-8">
		<link rel="stylesheet" href="styleX.css" type="text/css">
	</head>	
	<body>
		<div id="wrapper">
			<p>login.php</p>
			<a href="Page10.php" class="weg"><p>Nächste Seite</p></a>
		</div>
		<aside id="code">
			<?php
				echo htmlspecialchars('<div class="login-box">');
				echo '<br>' . htmlspecialchars('|<h1>Login</h1>');
				echo '<br>' . htmlspecialchars('|<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">');
				echo '<br>' . htmlspecialchars('||<div class="textbox">');
				echo '<br>' . htmlspecialchars('|||<input type="text" name="name" placeholder="Benutzername" required>');
				echo '<br>' . htmlspecialchars('||</div>');
				echo '<br>' . htmlspecialchars('||<div class="textbox">');
				echo '<br>' . htmlspecialchars('|||<input type="password" name="pwrd" placeholder="Passwort" required>');
				echo '<br>' . htmlspecialchars('||</div>');
				echo '<br>' . htmlspecialchars('||<input type="submit" class="btn">');
				echo '<br>' . htmlspecialchars('||<a href="register.php"><button type="button" class="btn">Zur Registrierung</button></a>');
				echo '<br>' . htmlspecialchars('||<a href="home.php"><button type="button" class="btn">Zurück zur Startseite</button></a>');
				echo '<br>' . htmlspecialchars('|</form>');
				echo '<br>' . htmlspecialchars('</div>');
				echo '<br>' . htmlspecialchars('<?php');
				echo '<br>' . htmlspecialchars('|include "includes/define_con.php";');
				echo '<br>' . htmlspecialchars('|$hohtier = "";');
				echo '<br>' . htmlspecialchars('|$db_part = 0;');
				echo '<br>' . htmlspecialchars('|$res2_user = "";');
				echo '<br>' . htmlspecialchars('|$res2_mail = "";');
				echo '<br>' . htmlspecialchars('|$sql = $con->prepare("SELECT Name, email, Verifiziert, Bänker, Lageradmin, Polizist, Partei, Führungsposition FROM user3 WHERE Name=? AND Passwort=?");');
				echo '<br>' . htmlspecialchars('|$sql->bind_param("ss", $_POST["name"], hash("sha512", $_POST["pwrd"]));');
				echo '<br>' . htmlspecialchars('|if(strlen($_POST["name"]) > 0 and strlen($_POST["pwrd"]) > 0) {');
				echo '<br>' . htmlspecialchars('||$sql->execute();');
				echo '<br>' . htmlspecialchars('||$sql->bind_result($res_user, $res_mail, $res_verif, $res_bank, $res_lager, $res_police, $res_part, $res_highpos);');
				echo '<br>' . htmlspecialchars('||while ($sql->fetch()) {');
				echo '<br>' . htmlspecialchars('|||$db_part = $res_part;');
				echo '<br>' . htmlspecialchars('|||$res2_user = "$res_user";');
				echo '<br>' . htmlspecialchars('|||$res2_mail = "$res_mail";');
				echo '<br>' . htmlspecialchars('|||if($res_highpos == 1) {');
				echo '<br>' . htmlspecialchars('||||$hohtier = ", Führungsposition in einer Partei";');
				echo '<br>' . htmlspecialchars('|||}');
				echo '<br>' . htmlspecialchars('||}');
				echo '<br>' . htmlspecialchars('|}');
				echo '<br>' . htmlspecialchars('|setcookie("user", "$res2_mail", time() + 86400*31, "/");');
				echo '<br>' . htmlspecialchars('|if($hohtier == ", Führungsposition in einer Partei") {');
				echo '<br>' . htmlspecialchars('||setcookie("party", "$db_part", time() + 86400*31, "/");');
				echo '<br>' . htmlspecialchars('|}');
				echo '<br>' . htmlspecialchars('?>');
				
			?>
		</aside>
		
	</body>
</html>
 