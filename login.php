<!DOCTYPE html>
	<?php
		/*if(isset($res2_mail)) {
			setcookie("user", "$res2_mail", time() + 86400*31, "/");
		}*/
	?>
	<html>
		<head>
			<link rel="stylesheet" href="styleforms.css" type="text/css">
			<link rel="shortcut icon" href="Bilder/BrowserIcon.png" type="x-icon">
			<meta="viewport" content="width=device-width">
			<title>Schule wird Staat | Anmeldung</title>
			<meta charset = "utf-8">
		</head>
		
		<body>
			<div class="login-box">
				<h1>Login</h1>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<div class="textbox">
						<input type="text" name="name" placeholder="Benutzername" required>
					</div>
					<div class="textbox">
						<input type="password" name="pwrd" placeholder="Passwort" required>
					</div>
					<input type="submit" class="btn">
					<a href="register.php"><button type="button" class="btn">Zur Registrierung</button></a>
					<a href="home.php"><button type="button" class="btn">Zurück zur Startseite</button></a>
				</form>
			</div>
				<div id="wrapper">
						<?php
							#Funktionen und Variablen Festlegen
		
							include 'includes/define_con.php';
						
							$veri = "Nicht Verifiziert";
							$bnker = "";
							$lageradm = "";
							$polizist = "";
							$hohtier = "";
							$db_part = 0;
							$parecho = "";
							$res2_user = "";
							$res2_mail = "";

						?>
				
					<?php /*Form zum Außfüllen*/?>
					<?php
						#SQL abfrage
						$sql = $con->prepare("SELECT Name, email, Verifiziert, Bänker, Lageradmin, Polizist, Partei, Führungsposition FROM user3 WHERE Name=? AND Passwort=?");
						$sql->bind_param("ss", $_POST["name"], hash("sha512", $_POST["pwrd"]));
							if(strlen($_POST["name"]) > 0 and strlen($_POST["pwrd"]) > 0) {
							$sql->execute();
							$sql->bind_result($res_user, $res_mail, $res_verif, $res_bank, $res_lager, $res_police, $res_part, $res_highpos);
		
							while ($sql->fetch()) {
								echo $res_user;
								#SQL auswertung
								$db_part = $res_part;
								$res2_user = "$res_user";
								$res2_mail = "$res_mail";
								if($res_verif == 1) {
									$veri = "Verifiziert";
								}
								if($res_bank == 1) {
									$bnker = ", Bänker";
								}
								if($res_lager == 1) {
									$lageradm = ", Lageradmin";
								}
								if($res_police == 1) {
									$polizist = ", Polizist";
								}
								if($res_highpos == 1) {
									$hohtier = ", Führungsposition in einer Partei";
								}
							}
						}
						$parcheck = $con->prepare("SELECT Name FROM parteien WHERE ID=?");
						$parcheck->bind_param("i", $db_part);
						if(strlen($_POST["name"]) > 0 and strlen($_POST["pwrd"]) > 0) {
							$parcheck->execute();
							$parcheck->bind_result($res_parname);
							while ($parcheck->fetch()) {
								$parecho = $res_parname;
							}
						}
					
						#Speichern der Daten als cookies
						setcookie("user", "$res2_mail", time() + 86400*31, "/");
						if($hohtier == ", Führungsposition in einer Partei") {
							setcookie("party", "$db_part", time() + 86400*31, "/");
						} else {
							setcookie("party", "$db_part", time() + 1, "/");
						}
						
						#Output
							if(strlen($_POST["name"]) > 0 and strlen($_POST["pwrd"]) > 0 and strlen($res2_mail) > 0) {
								echo "<style>.login-box {border: 5px solid #5FB404;}
								.btn {border: 2px solid #5FB404;}
								.textbox input {border-bottom: 2px solid #5FB404;}
								.login-box h1 {border-bottom: 2px solid #5FB404;}</style>";
							} else {
								echo "<style>.login-box {border: 5px solid #D76F19;}
								.btn {border: 2px solid #D76F19;}
								.textbox input {border-bottom: 2px solid #D76F19;}
								.login-box h1 {border-bottom: 2px solid #D76F19;}</style>";
							}
					?>
				</div>
		</body>
	</html>