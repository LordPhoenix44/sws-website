<!DOCTYPE html>

<html>
	<?php
		session_start();
		$_SESSION["part"] = 5;
		header('Location: ' . '../parteien_unterseite.php');
	?>
</html>