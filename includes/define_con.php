<?php
	session_start();

	$servername = "localhost";
	$user = "kreuzgymnasium";
	$pw = "****";
	$db = "klproto2";

	$con = new mysqli($servername, $user, $pw, $db);
	$con->set_charset("utf8");
?>
