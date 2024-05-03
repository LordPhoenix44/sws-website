<!DOCTYPE html>

<html>
	<?php
		session_start();
		$_SESSION["part"] = 2;
		header('Location: ' . '../parteien_unterseite.php');
	?>
</html>