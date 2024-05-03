<!DOCTYPE html>

<html>
	<?php
		#Session Starten zum Aktivieren von $_SESSION
		session_start();
		
		#Initialisieren der MySQL-Verbindung
		include '../includes/define_con.php';
		
		#Festlegen von Variablen
		$del_th = $_SESSION["kactive_li_stuff"];
		
		#Update stuff
		$s_del = $con->prepare("DELETE FROM stuff WHERE KN=?");
		$s_del->bind_param("s", $del_th);
		$s_del->execute();
		
		#Verlassen des Skriptes
		header('Location: ' . '../lager_liste.php');
	?>
</html>