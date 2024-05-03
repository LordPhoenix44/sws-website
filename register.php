<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" href="styleforms.css" type="text/css">
			<link rel="shortcut icon" href="Bilder/BrowserIcon.png" type="x-icon">
			<meta="viewport" content="width=device-width">
			<title>Schule wird Staat | Registrierung</title>
			<meta charset ="utf-8">
		</head>
		
		<body>
			<div id="wrappers">
					<?php
						#Funktionen und Variablen Festlegen
						include 'includes/define_con.php';
					?>
				
				<?php /*Form zum Außfüllen*/
					#$_POST["name"] = "";
					#$_POST["pwrd"] = "";
					#$_POST["email"] = "";
				?>
				<div class="login-box">
					<h1>Registrierung</h1>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<div class="textbox">
							<input type="text" name="name" placeholder="Name" required>
						</div>
						<div class="textbox">
							<input type="text" name="email" placeholder="E-Mail" required>
						</div>
						<div class="textbox">
							<input type="text" name="pwrd" placeholder="Neues Passwort" required>
						</div>
						<input type="submit" class="btn">
						<a href="login.php"><button type="button" class="btn">Zum Login</button></a>
						<a href="home.php"><button type="button" class="btn">Zurück zur Startseite</button></a>
					</form>
				</div>
				
				<div>
					<?php
						
						#pre Variablen
						$checkmail = 0;
						#Output
						$hashedpw = hash("sha512", $_POST["pwrd"]);
						$sql = $con->prepare("INSERT INTO user3 (Name, Passwort, Email, Verifiziert) VALUES (?, ?, ?, ?)");
						$sql->bind_param("sssi", $_POST["name"], $hashedpw, $_POST["email"], $checkmail);
						if(strlen($_POST["name"]) > 0 and strlen($_POST["pwrd"]) > 0 and filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
							if($_POST["email"] != str_replace("@mail.kreuzgymnasium.de","",$_POST["email"])) {
								$checkmail = 1;
							}
							$sql->bind_param("sssi", $_POST["name"], $hashedpw, $_POST["email"], $checkmail);
							$sql->execute();
							$verif = "Bitte verifiziere deine Email. Kontaktiere dazu matthias.dohle@mail.kreuzgymnasium.de mit der Mailadresse die du verifizieren willst und schreibe eine Aufforderung zur Verifizierung.";
							if($checkmail == 1) {
								$verif = "Deine E-mail wurde bereits verifiziert. Bedanke dich beim zuständigen Bot ;-)";
							}
							echo "<style>.btn {border: 2px solid #5FB404;}
								.textbox input {border-bottom: 2px solid #5FB404;}
								.login-box h1 {border-bottom: 2px solid #5FB404;}</style>";
						} elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
							if(isset($_POST["email"])) {
							#	echo "keine gültige mail";
							}
						}
					?>
				</div>
			</div>	
		</body>
	</html>
	