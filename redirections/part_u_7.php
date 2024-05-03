<!DOCTYPE html>

<html>
	<?php
		session_start();
		$_SESSION["part"] = 7;
		header('Location: ' . '../parteien_unterseite.php');
	?>
</html>