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
					
					$p_id = "";
					$fp2_alt = "";
					$r_v_7 = 0;
					$r_f_7 = 0;
					$r_p_7 = 0;
					$r_par_7 = 0;
					$eig_fp2 = false;

				?>
			</div>
			
			<?php
				if(isset($_COOKIE["party"])) {
					$p_id = $_COOKIE["party"];
				} else {
					echo "<p class=texalicenter>Du besitzt nicht die Nötigen Rechte um deine Partei zu bearbeiten.";
				}
			?>
			
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="gesform">
				<p class="inplabel">Neuer Name der Partei:</p> <input type="text" name="namep" class="tstinp"><br>
				<p class="inplabel">Neuer Zweiter Partei-Admin(Email):</p> <input type="text" name="namev" class="tstinp"><br>
				<p class="inplabel">Neue Parteibeschreibung:</p> <input type="text" name="biop" class="tstinp"><br>
				<input type="submit" class="submit"><br>
				<a href="parteien_unterseite.php">Zurück zur Partei</a>
			</form>
			
			
			<div>
				<?php
					#file bio
					$file = fopen("parteibeschreibungen/partei_id_$p_id.txt", "w");
					if(isset($_POST["biop"])) {
						fwrite($file, htmlspecialchars($_POST['biop']));
					}
					fclose($file);
					
					#Überprüfen der Eignung für fp2
					$sql7 = $con->prepare("SELECT Verifiziert, Führungsposition, Politiker, Partei FROM user3 WHERE email=?");
					$sql7->bind_param("s", $_POST["namev"]);
					$sql7->execute();
					$sql7->bind_result($res_ver_sql7, $res_fue_sql7, $res_pol_sql7, $res_par_sql7);
					while ($sql7->fetch()) {
						$r_v_7 = $res_ver_sql7;
						$r_f_7 = $res_fue_sql7;
						$r_p_7 = $res_pol_sql7;
						$r_par_7 = $res_par_sql7;	
					}
					
					if($r_v_7 == 1 and $r_f_7 == 0 and $r_p_7 == 1 and $r_par_7 == $p_id) {
						$eig_fp2 = true;
					}
					
					#Alles in den dbs ändern
					$sql5 = $con->prepare("SELECT Führpos2 FROM parteien WHERE ID=?");
					$sql5->bind_param("i", $p_id);
					$sql5->execute();
					$sql5->bind_result($res_sql5);
					while ($sql5->fetch()) {
						$fp2_alt = $res_sql5;	
					}
					
					$sql = $con->prepare("UPDATE parteien SET Name=? WHERE ID=?");
					$sql->bind_param("si", $_POST["namep"], $p_id);
					if(strlen($p_id) > 0 and strlen($_POST["namep"]) > 0) {
						$sql->execute();
					}
					
					$sql2 = $con->prepare("UPDATE parteien SET Führpos2=? WHERE ID=?");
					$sql2->bind_param("si", $_POST["namev"], $p_id);
					$sql3 = $con->prepare("UPDATE user3 SET Führungsposition = 1 WHERE email=?");
					$sql3->bind_param("s", $_POST["namev"]);
					$sql4 = $con->prepare("UPDATE user3 SET Partei=? WHERE email=?");
					$sql4->bind_param("is",$p_id, $_POST["namev"]);
					$sql6 = $con->prepare("UPDATE user3 SET Führungsposition = 0 WHERE email=?");
					$sql6->bind_param("s", $fp2_alt);
					if(strlen($p_id) > 0 and strlen($_POST["namev"]) > 0 and $eig_fp2 == true) {
						$sql6->execute();
						$sql2->execute();
						$sql3->execute();
						$sql4->execute();
						setcookie("party", $p_id, time() + 86400*31, "/");
					}
					
				?>
			</div>
			
			
		</body>
	</html>
	