<!DOCTYPE html>

<html>
	<?php
		session_start();
		$_SESSION["busi"] = 33;
		header('Location: ' . '../unternehmen_unterseite.php');
	?>
</html>