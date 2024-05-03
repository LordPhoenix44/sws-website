<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" href="styleforms.css" type="text/css">
			<title>Schule wird Staat | Parteienregister</title>
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
					$nwpartid = 0;
					
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
				<p class="inplabel">Name der Partei:</p> <input type="text" name="namep" class="tstinp" required><br>
				<p class="inplabel">E-mail der Führungsperson:</p> <input type="text" name="emailp" class="tstinp" required><br>
				<p class="inplabel">E-mail der zweiten Führungsperson (Optional):</p> <input type="text" name="vizep" class="tstinp"><br>
				<input type="submit" class="submit">
			</form>
			
			
			<div>
				<?php
				#SQL Statements vorbereiten, ob die personen teil der partei sein dürfen
					$sql = $con->prepare("SELECT Name, email FROM user3 WHERE email=? AND Partei IS NULL AND Führungsposition=0");
					$sql->bind_param("s", $_POST["emailp"]);
					$sql2 = $con->prepare("SELECT Name, email FROM user3 WHERE email=? AND Partei IS NULL AND Führungsposition=0");
					$sql2->bind_param("s", $_POST["vizep"]);
					#erhalten von Ergebnissen, ob die personen teil der partei sein dürfen
					if($_POST["emailp"] == $_COOKIE["user"] or $_POST["vizep"] == $_COOKIE["user"]) {
						$step1 = true;
					}
					if(isset($_POST["namep"]) and isset($_POST["emailp"]) and $step1 == true) {
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
					$inup = $con->prepare("UPDATE user3 SET Führungsposition=1 WHERE email=? OR email=?");
					$inup->bind_param("ss", $mail1, $mail2);
					$inp = $con->prepare("INSERT INTO parteien (Name, Führpos1, Führpos2) VALUES (?, ?, ?)");
					$inp->bind_param("sss", $_POST["namep"], $mail1, $mail2);
					#Diese statementsausführen, eintragen von Führpos1 Führpos2 und Führungsposition in zwei DBs
					if($mail1 == $_POST["emailp"] and $mail2 == $_POST["vizep"] and strlen($_POST["namep"]) > 0 and strlen($_POST["emailp"]) > 0) {
						$inup->execute();
						$inp->execute();
						$step2 = true;
					}
					
					#Neue Statements vorbereiten und ausführen, zum erhalt der ID der neuen Partei
					$idget = $con->prepare("SELECT ID FROM parteien WHERE Name=? AND Führpos1=?");
					$idget->bind_param("ss", $_POST["namep"], $mail1);
					if($step2 == true) {
						$idget->execute();
						$idget->bind_result($res_idget);
						while ($idget->fetch()) {
							$nwpartid = $res_idget;
						}
					}
					
					#Neue Statements vorbereiten und ausführen, zum eintragen von Partei in einen DB
					$idset = $con->prepare("UPDATE user3 SET Partei=? WHERE email=? OR email=?");
					$idset->bind_param("iss", $nwpartid, $mail1, $mail2);
					if($nwpartid != 0) {
						$idset->execute();
						echo "<p class=texalicenter>Die partei wurde erfolgreich gegründet. Viel Glück!</p>";
					}
					
					#Setzen der Mitgliederanzahl auf 2 wenn fp2 existent
					$fp2_mg = $con->prepare("UPDATE parteien SET Mitglieder=2 WHERE ID=?");
					$fp2_mg->bind_param("i", $nwpartid);
					if(strlen($mail2) > 0) {
						$fp2_mg->execute();
					}
					
					#Backbutton
					echo "<a href='parteien_unterseite.php'>Zurück</a>";
				?>
			</div>
			
			
		</body>
	</html>
	