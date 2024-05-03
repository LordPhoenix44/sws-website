<!DOCTYPE html>

<html>
	<?php
		#Session Starten zum Aktivieren von $_SESSION
		session_start();
		
		setcookie("user", "", time() + 1, "/");
		setcookie("party", "", time() + 1, "/");

		#Verlassen des Skriptes
		header('Location: ' . '../home.php');
	?>
</html>