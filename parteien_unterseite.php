<!DOCTYPE html>

<?php 
	session_start();
?>

<html>
	<head>
		<link rel="stylesheet" href="style_parteien_unterseiten.css" type="text/css">
		<link rel="stylesheet" href="style_footer.css" type="text/css">
		<link rel="stylesheet" href="style_head.css" type="text/css">
		<link rel="shortcut icon" href="Bilder/BrowserIcon.png" type="x-icon">
		<meta="viewport" content="width=device-width">
		<title>Schule wird Staat | Parteien</title>
		<meta charset ="utf-8">
		<script src="jquery.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.menubutton').click(function() {
					$('nav').slideToggle('slow');
				});
			});
		</script>
	</head>	
	<body>
		<div id="wrapper">
			<?php include 'includes/headliner.php'; ?>
			<div class="main">
				<div>
					<?php
						#Initialisieren (Content)
						include "functions/a_n_partei.php";
						$trueID = 0;
						$partyID = 0;
						$partyNM = "";
						$partyBS = "";
						$r_p_id = "";
						$r_p_mg = 0;
						$r_u_pol = 0;
						$r_u_fp = 0;
						if(isset($_SESSION["part"])) {
							$partyID = $_SESSION["part"];
						}
						include 'includes/define_con.php';
						
						#Einrichten der Seite
						if($partyID >= 1 and $partyID <= 20) {
							$trueID = 0 + $partyID;
						} else {
							$partyNM = "//--//--//--//--//";
							$partyBS = "Da ist wohle etwas schiefgelaufen, probiere es nochmal";
						} 
						
						#Neuladen d. Cookies für den fall einer Degradierung/Aufwertung
						$a_u_fp = $con->prepare("SELECT Führungsposition FROM user3 WHERE email=?");
						$a_u_fp->bind_param("s", $_COOKIE["user"]);
						$a_u_fp->execute();
						$a_u_fp->bind_result($res_u_fp);
						while ($a_u_fp->fetch()) {
							$r_u_fp = $res_u_fp;	
						}
						if($r_u_fp == 0) {
							setcookie("party", "error", time(), "/");
							if(isset($_COOKIE["party"])) {
								header('Location: ' . 'parteien_unterseite.php');
							}
						} if($r_u_fp == 1) {
							setcookie("party", $trueID, time() + 31*86400, "/");
							if(!isset($_COOKIE["party"])) {
								header('Location: ' . 'parteien_unterseite.php');
							}
						}
						
						#Einrichten des Parteibuttons
						$a_u_pol = $con->prepare("SELECT Politiker FROM user3 WHERE email=?");
						$a_u_pol->bind_param("s", $_COOKIE["user"]);
						$a_u_pol->execute();
						$a_u_pol->bind_result($res_u_pol);
						while ($a_u_pol->fetch()) {
							$r_u_pol = $res_u_pol;	
						}
						
						$a_p_id = $con->prepare("SELECT Partei FROM user3 WHERE email=?");
						$a_p_id->bind_param("s", $_COOKIE["user"]);
						$a_p_id->execute();
						$a_p_id->bind_result($res_p_id);
						while ($a_p_id->fetch()) {
							$r_p_id = $res_p_id;	
						}
						
						a_n_partei($trueID);
						if($_SESSION["n_p"] != "Hier könnte deine Partei stehen" and isset($_COOKIE["user"])) {
							if(isset($_COOKIE["party"])) { 
								if($_COOKIE["party"] == $trueID) {
									#Partei existiert, Man ist in der Geöffneten Partei in der Führung
									$parteibutton = '<a class="beitritt" href="modpartei.php">Partei bearbeiten</a>';
								} else {
									#partei existiert, man ist aber führung in einer anderen partei
									$parteibutton = '';
								}
							} elseif($r_p_id == $trueID) {
								#partei existiert, man ist mitglied 
								$parteibutton = '<a class="beitritt" href="redirections/part_verl.php">Partei verlassen</a>';
							} elseif($r_p_id == "") {
								#partei existiert, man ist in keiner Partei
								$parteibutton = '<a class="beitritt" href="redirections/part_betr.php">Partei beitreten</a>';
							} elseif($r_p_id != $trueID) {
								#Partei existiert, man ist in einer andern Partei
								$parteibutton = '';
							}
						} elseif(isset($_COOKIE["user"])) {
							if(isset($_COOKIE["party"])) {
								#partei existiert nicht, man ist in der Führung einer Partei
								$parteibutton = '';
							} elseif($r_p_id == "" and $r_u_pol == 1) {
								#Partei existiert nicht, man ist in keiner Partei und Politiker
								$parteibutton = '<a class="beitritt" href="regpartei.php">Partei gründen</a>';
							} else {
								#Partei existiert, man ist in (k)einer Partei und kein politiker
								$parteibutton = '';
							}
						} else {
							#die Existenz der partei ist ungefragt, man besitzt nicht die Notwendigen rechte, die Partei zu betreten
							$parteibutton = '';
						}
						
						#Einrichten der Mitgliederzahl
						$a_p_mg = $con->prepare("SELECT Mitglieder FROM parteien WHERE ID=?");
						$a_p_mg->bind_param("i", $trueID);
						$a_p_mg->execute();
						$a_p_mg->bind_result($res_p_mg);
						while ($a_p_mg->fetch()) {
							$r_p_mg = $res_p_mg;	
						}
					?>
					<a class="zurück" href="Regierungsstartpage.php">zurück</a>
					<?php echo $parteibutton; ?>
					<div class="content">
						<h3><?php a_n_partei($trueID); echo $_SESSION["n_p"]; ?></h3>
						<p><?php if(file_exists("parteibeschreibungen/partei_id_$trueID.txt")) {readfile("parteibeschreibungen/partei_id_$trueID.txt");} else {echo "Sieht so aus, als würde es noch keine Beschreibung geben.";} ?></p>
						<p>Mitglieder: <?php echo $r_p_mg; ?></p>
					</div>
				</div>
			</div>
			<?php include 'includes/footliner.php'; ?>
		</div>
	</body> 
</html>
 