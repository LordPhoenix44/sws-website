<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" href="styleforms.css" type="text/css">
			<title>Testwebsite | Ändern von Parteidaten</title>
			<meta charset ="utf-8">
		</head>
		
		<body id="main">
		
		
			<div class="para">
				<?php
					#Funktionen und Variablen Festlegen
					include 'includes/define_con.php';
					
					$b_id = "";
					$fp2_alt = "";
					$r_v_7 = 0;
					$r_f_7 = 0;
					$r_p_7 = 0;
					$r_bus_7 = 0;
					$eig_fp2 = false;

				?>
			</div>
			
			<?php
				if(isset($_COOKIE["busin"])) {
					$b_id = $_COOKIE["busin"];
				} else {
					echo "<p class=texalicenter>Du besitzt nicht die Nötigen Rechte um dein Unternehmen zu bearbeiten.";
				}
			?>
			
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="gesform">
				<p class="inplabel">Neuer Name des Unternehmens:</p> <input type="text" name="nameb" class="tstinp"><br>
				<p class="inplabel">Neuer Publicity-Manager(Email):</p> <input type="text" name="namev" class="tstinp"><br>
				<p class="inplabel">Neue Unternehmensbeschreibung:</p> <input type="text" name="biob" class="tstinp"><br>
				<input type="submit" class="submit"><br>
				<a href="unternehmen_unterseite.php">Zurück zum Unternehmen</a>
			</form>
			
			
			<div>
				<?php
					#file bio
					$file = fopen("parteibeschreibungen/business_id_$b_id.txt", "w");
					if(isset($_POST["biob"])) {
						if(strlen($_POST["biob"]) > 0 ) {
							fwrite($file, htmlspecialchars($_POST['biob']));
						}
					}
					fclose($file);
					
					#Überprüfen der Eignung für fp2
					$sql7 = $con->prepare("SELECT Verifiziert, Publicity, Unternehmer, Unternehmen FROM user3 WHERE email=?");
					$sql7->bind_param("s", $_POST["namev"]);
					$sql7->execute();
					$sql7->bind_result($res_ver_sql7, $res_fue_sql7, $res_pol_sql7, $res_bus_sql7);
					while ($sql7->fetch()) {
						$r_v_7 = $res_ver_sql7;
						$r_f_7 = $res_fue_sql7;
						$r_p_7 = $res_pol_sql7;
						$r_bus_7 = $res_bus_sql7;	
					}
					
					if($r_v_7 == 1 and $r_f_7 == 0 and $r_p_7 == 1 and $r_bus_7 == $p_id) {
						$eig_fp2 = true;
					}
					
					#Alles in den dbs ändern
					$sql5 = $con->prepare("SELECT Publicitym FROM unternehmen WHERE ID=?");
					$sql5->bind_param("i", $b_id);
					$sql5->execute();
					$sql5->bind_result($res_sql5);
					while ($sql5->fetch()) {
						$fp2_alt = $res_sql5;	
					}
					
					$sql = $con->prepare("UPDATE unternehmen SET Name=? WHERE ID=?");
					$sql->bind_param("si", $_POST["nameb"], $b_id);
					if(strlen($b_id) > 0 and strlen($_POST["nameb"]) > 0) {
						$sql->execute();
					}
					
					$sql2 = $con->prepare("UPDATE unternehmen SET Publicitym=? WHERE ID=?");
					$sql2->bind_param("si", $_POST["namev"], $b_id);
					$sql3 = $con->prepare("UPDATE user3 SET Publicity = 1 WHERE email=?");
					$sql3->bind_param("s", $_POST["namev"]);
					$sql4 = $con->prepare("UPDATE user3 SET Unternehmen=? WHERE email=?");
					$sql4->bind_param("is",$b_id, $_POST["namev"]);
					$sql6 = $con->prepare("UPDATE user3 SET Publicity = 0 WHERE email=?");
					$sql6->bind_param("s", $fp2_alt);
					if(strlen($b_id) > 0 and strlen($_POST["namev"]) > 0 and $eig_fp2 == true) {
						$sql6->execute();
						$sql2->execute();
						$sql3->execute();
						$sql4->execute();
						setcookie("busin", $b_id, time() + 86400*31, "/");
					}					
					
					if((strlen($b_id) > 0 and strlen($_POST["nameb"]) > 0) or (strlen($b_id) > 0 and strlen($_POST["namev"]) > 0 and $eig_fp2 == true)) {
						header('Location: ' . 'parteien_unterseite.php');
					}
				?>
			</div>
			
			
		</body>
	</html>
	