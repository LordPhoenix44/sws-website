<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" href="styleforms.css" type="text/css">
			<title>Schule wird Staat | Unternehmensregister</title>
			<meta charset ="utf-8">
		</head>
		
		<body id="main">
		
		
			<div class="para">
				<?php
					#Funktionen und Variablen Festlegen
					include 'includes/define_con.php';
					
					$vors1 = "";
					$vors2 = "";
					$mail1 = "";
					$mail2 = "";
					$nwbusiid = 0;
					
					$step1 = false;
					$step2 = false;
				?>
			</div>
			
			<?php /*Form zum Außfüllen*/
				#$_POST["name"] = "";
				#$_POST["pwrd"] = "";
				#$_POST["email"] = "";
			?>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="gesform">
				<p class="inplabel">Name des Unternehmens:</p> <input type="text" name="nameb" class="tstinp" required><br>
				<p class="inplabel">E-mail des CEOs:</p> <input type="text" name="emailb" class="tstinp" required><br>
				<p class="inplabel">E-mail des Publicity- Beauftragten (Optional):</p> <input type="text" name="vizeb" class="tstinp"><br>
				<p class="inplabel">Art des Unternehmens:</p><br>
					<input type="radio" name="Art" value="Catering" id="food">
					<label for="food" class="inplabel">Catering</label><br><br>
					<input type="radio" name="Art" value="Sport und Unterhaltung" id="sport">
					<label for="sport" class="inplabel">Sport und Unterhaltung</label><br><br>
					<input type="radio" name="Art" value="Reisebüro" id="travel">
					<label for="travel" class="inplabel">Reisebüro</label><br><br>
					<input type="radio" name="Art" value="Sonstige" id="else">
					<label for="else" class="inplabel">Etwas anderes</label><br><br><br>
				<br><input type="submit" class="submit">
			</form>
			
			
			<div>
				<?php
				#SQL Statements vorbereiten, ob die personen teil des Unternehmens sein dürfen
					$sql = $con->prepare("SELECT Name, email FROM user3 WHERE email=? AND Unternehmen IS NULL AND Publicity=0");
					$sql->bind_param("s", $_POST["emailb"]);
					$sql2 = $con->prepare("SELECT Name, email FROM user3 WHERE email=? AND Unternehmen IS NULL AND Publicity=0");
					$sql2->bind_param("s", $_POST["vizeb"]);
					#erhalten von Ergebnissen, ob die personen teil des Unternehmans sein dürfen
					if($_POST["emailb"] == $_COOKIE["user"] or $_POST["vizeb"] == $_COOKIE["user"]) {
						$step1 = true;
					}
					if(isset($_POST["nameb"]) and isset($_POST["emailb"]) and $step1 == true) {
						$sql->execute();
						$sql->bind_result($res_userp, $res_mailp);
						while ($sql->fetch()) {
							$vors1 = "$res_userp";
							$mail1 = "$res_mailp";
						}
						$sql2->execute();
						$sql2->bind_result($res_userv, $res_mailv);
						while ($sql2->fetch()) {
							$vors2 = "$res_userv";
							$mail2 = "$res_mailv";
						}
					} else {
						echo "<p class=texalicenter>Gib gültige Werte ein. Die Führungspersonen können nicht bereits in einer anderen Partei sein.</p>";
					}
					
					#Neue Statements vorbereiten mithilfe der ergebnisse, eintragen von Führpos1 Führpos2 und Führungsposition in zwei DBs
					$inup = $con->prepare("UPDATE user3 SET Publicity=1 WHERE email=? OR email=?");
					$inup->bind_param("ss", $mail1, $mail2);
					$inp = $con->prepare("INSERT INTO Unternehmen (Name, CEO, Publicitym) VALUES (?, ?, ?)");
					$inp->bind_param("sss", $_POST["nameb"], $mail1, $mail2);
					#Diese statementsausführen, eintragen von Führpos1 Führpos2 und Führungsposition in zwei DBs
					if($mail1 == $_POST["emailb"] and $mail2 == $_POST["vizeb"] and strlen($_POST["nameb"]) > 0 and strlen($_POST["emailb"]) > 0) {
						$inup->execute();
						$inp->execute();
						$step2 = true;
					}
					
					#Neue Statements vorbereiten und ausführen, zum erhalt der ID des Neuen unternehmens
					$idget = $con->prepare("SELECT ID FROM Unternehmen WHERE Name=? AND CEO=?");
					$idget->bind_param("ss", $_POST["nameb"], $mail1);
					if($step2 == true) {
						$idget->execute();
						$idget->bind_result($res_idget);
						while ($idget->fetch()) {
							$nwbusiid = $res_idget;
						}
						setcookie("busin", "$nwbusiid", time() + 86400*31, "/");
					}
					
					#Neue Statements vorbereiten und ausführen, zum eintragen von Business in einen DB
					$idset = $con->prepare("UPDATE user3 SET Unternehmen=? WHERE email=? OR email=?");
					$idset->bind_param("iss", $nwbusiid, $mail1, $mail2);
					if($nwbusiid != 0) {
						$idset->execute();
						echo "<p class=texalicenter>Das Unternehmen wurde erfolgreich gegründet. Viel Glück!</p>";
						
					}

					#Backbutton
					echo "<a href='unternehmen_unterseite.php'>Zurück</a>";
				?>
			</div>
			
			
		</body>
	</html>
	