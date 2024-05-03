<!DOCTYPE html>

<html>
	<?php
		#Session Starten zum Aktivieren von $_SESSION
		session_start();
		
		#Initialisieren der MySQL-Verbindung
		include '../includes/define_con.php';
		
		#Festlegen von Variablen
		$trueID_e = $_SESSION["part"] + 0;
		
		#Update user3
		$p_en = $con->prepare("UPDATE user3 SET Partei=? WHERE email=?");
		$p_en->bind_param("is", $trueID_e, $_COOKIE["user"]);
		$p_en->execute();
		
		#Update Parteien
		$p_ad = $con->prepare("UPDATE `parteien` SET `parteien`.`Mitglieder` = `parteien`.`Mitglieder` + 1 WHERE `parteien`.`ID` = ?");
		$p_ad->bind_param("i", $trueID_e);
		$p_ad->execute();
		
		#Verlassen des Skriptes
		header('Location: ' . '../parteien_unterseite.php');
	?>
</html>