<!DOCTYPE html>

<html>
	<?php
		session_start();
		$_SESSION["part"] = 1;
		header('Location: ' . '../parteien_unterseite.php');
	?>
</html>