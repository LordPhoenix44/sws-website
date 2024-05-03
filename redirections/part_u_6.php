<!DOCTYPE html>

<html>
	<?php
		session_start();
		$_SESSION["part"] = 6;
		header('Location: ' . '../parteien_unterseite.php');
	?>
</html>