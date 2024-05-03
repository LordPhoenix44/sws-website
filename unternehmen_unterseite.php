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
		<title>Schule wird Staat | Unternehmen</title>
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
						include "functions/a_n_business.php";
						$trueIDb = 0;
						$businID = 0;
						$businNM = "";
						$businBS = "";
						$r_b_id = "";
						$r_u_unt = "";
						$b_art = "";
						if(isset($_SESSION["busi"])) {
							$businID = $_SESSION["busi"];
						}
						include 'includes/define_con.php';
						
						
						#Einrichten der Seite
						if($businID >= 1 and $businID <= 20) {
							$trueIDb = 0 + $businID;
						} else {
							$businNM = "//--//--//--//--//";
							$businBS = "Da ist wohle etwas schiefgelaufen, probiere es nochmal";
						} 
						
						#Neuladen d. Cookies für den fall einer Degradierung/Aufwertung
						$a_u_fp = $con->prepare("SELECT Publicity FROM user3 WHERE email=?");
						$a_u_fp->bind_param("s", $_COOKIE["user"]);
						$a_u_fp->execute();
						$a_u_fp->bind_result($res_u_fp);
						while ($a_u_fp->fetch()) {
							$r_u_fp = $res_u_fp;	
						}
						if($r_u_fp == 0) {
							setcookie("busin", "error", time(), "/");
							if(isset($_COOKIE["busin"])) {
								header('Location: ' . 'unternehmen_unterseite.php');
							}
						} if($r_u_fp == 1) {
							setcookie("busin", $trueIDb, time() + 31*86400, "/");
							if(!isset($_COOKIE["busin"])) {
								header('Location: ' . 'unternehmen_unterseite.php');
							}
						}
						
						#Einrichten des unternehmensbuttons
						$a_u_unt = $con->prepare("SELECT Unternehmer FROM user3 WHERE email=?");
						$a_u_unt->bind_param("s", $_COOKIE["user"]);
						$a_u_unt->execute();
						$a_u_unt->bind_result($res_u_unt);
						while ($a_u_unt->fetch()) {
							$r_u_unt = $res_u_unt;	
						}
						
						$a_b_id = $con->prepare("SELECT Unternehmen FROM user3 WHERE email=?");
						$a_b_id->bind_param("s", $_COOKIE["user"]);
						$a_b_id->execute();
						$a_b_id->bind_result($res_b_id);
						while ($a_b_id->fetch()) {
							$r_b_id = $res_b_id;	
						}
						
						a_n_business($trueIDb);
						if($_SESSION["n_b"] != "Hier könnte dein Unternehmen stehen" and isset($_COOKIE["user"])) {
							if(isset($_COOKIE["busin"])) {
								if($_COOKIE["busin"] == $trueIDb) {
									$businessbutton = '<a class="beitritt" href="modbusiness.php">Unternehmen bearbeiten</a>';
								} else {
									$businessbutton = '';
								}
							} elseif($r_b_id == $trueIDb) {
								#$businessbutton = '<a class="beitritt" href="redirections/busi_verl.php">Unternehmen verlassen</a>';
								$businessbutton = '';
							} elseif($r_b_id == "") {
								#$businessbutton = '<a class="beitritt" href="redirections/busi_betr.php">Unternehmen beitreten</a>';
								$businessbutton = '';
							} elseif($r_b_id != $trueIDb) {
								$businessbutton = '';
							}
						} elseif(isset($_COOKIE["user"])) {
							if(isset($_COOKIE["busin"])) {
								$businessbutton = '';
							} elseif($r_b_id == "" and $r_u_unt == 1) {
								$businessbutton = '<a class="beitritt" href="regbusiness.php">Unternehmen gründen</a>';
							} else {
								$businessbutton = '';
							}
						} else {
							$businessbutton = '';
						}
						
						#Einrichten der UNternehmensart
						$a_b_art = $con->prepare("SELECT Kategorie FROM unternehmen WHERE ID=?");
						$a_b_art->bind_param("i", $trueIDb);
						$a_b_art->execute();
						$a_b_art->bind_result($res_b_art);
						while ($a_b_art->fetch()) {
							$b_art = $res_b_art;	
						}
					?>
					<a class="zurück" href="Wirtschaftstartpage.php">zurück</a>
					<?php echo $businessbutton; ?>
					<div class="content">
						<h3><?php a_n_business($trueIDb); if($_SESSION["n_b"] != "Hier könnte dein Unternehmen stehen") {echo $_SESSION["n_b"] . " (" . $b_art . ")";} else {echo $_SESSION["n_b"];} ?></h3>
						<p><?php if(file_exists("parteibeschreibungen/business_id_$trueIDb.txt")) {readfile("parteibeschreibungen/business_id_$trueIDb.txt");} else {echo "Sieht so aus, als würde es noch keine Beschreibung geben.";} ?></p>
					</div>
				</div>
			</div>
			<?php include 'includes/footliner.php'; ?>
		</div>
	</body> 
</html>
 