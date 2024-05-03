<!DOCTYPE html>

<html>
	<?php
		session_start();
		$_SESSION["busi"] = 4;
		header('Location: ' . '../unternehmen_unterseite.php');
	?>
</html>