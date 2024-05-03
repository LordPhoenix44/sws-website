<!DOCTYPE html>

<html>
	<?php
		session_start();
		$_SESSION["busi"] = 19;
		header('Location: ' . '../unternehmen_unterseite.php');
	?>
</html>