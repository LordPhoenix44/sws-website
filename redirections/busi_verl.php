<!DOCTYPE html>

<html>
	<?php
		#Session Starten zum Aktivieren von $_SESSION
		session_start();
		
		#Initialisieren der MySQL verbindung
		include '../includes/define_con.php';
		
		#Festlegen von Variablen
		$trueIDb_e = $_SESSION["busi"] + 0;
		
		#Update user3
		$p_leave = $con->prepare("UPDATE user3 SET Unternehmen = NULL WHERE email=?");
		$p_leave->bind_param("s", $_COOKIE["user"]);
		$p_leave->execute();

		#Verlassen des Skriptes
		header('Location: ' . '../parteien_unterseite.php');
	?>
</html>