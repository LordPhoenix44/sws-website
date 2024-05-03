<!DOCTYPE html>

<html>
	<?php
		session_start();
		$_SESSION["busi"] = 29;
		header('Location: ' . '../unternehmen_unterseite.php');
	?>
</html>