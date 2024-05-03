<!DOCTYPE html>

<html>
	<?php
		#Session Starten zum Aktivieren von $_SESSION
		session_start();
		
		#Initialisieren der MySQL-Verbindung
		include '../includes/define_con.php';
		
		#Festlegen von Variablen
		$trueIDb_e = $_SESSION["busi"] + 0;
		
		#Update user3
		$p_en = $con->prepare("UPDATE user3 SET Unternehmen=? WHERE email=?");
		$p_en->bind_param("is", $trueIDb_e, $_COOKIE["user"]);
		$p_en->execute();

		#Verlassen des Skriptes
		header('Location: ' . '../parteien_unterseite.php');
	?>
</html>