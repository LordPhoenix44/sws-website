<!DOCTYPE html>

<html>
	<?php
		session_start();
		$_SESSION["busi"] = 12;
		header('Location: ' . '../unternehmen_unterseite.php');
	?>
</html>