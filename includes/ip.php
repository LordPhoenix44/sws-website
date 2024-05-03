<!DOCTYPE html>

<html>
	<head>
		<title>IP-Teller</title>
		<meta charset ="utf-8">
	</head>	
	<body>
		<div id="wrapper">
			<?php
				$hisIP = $_SERVER["REMOTE_ADDR"];
				$json = file_get_contents("http://ipinfo.io/$hisIP/geo");
				$json = json_decode($json, true);
				echo "<br>REMOTE_ADDR " . $_SERVER["REMOTE_ADDR"];
			#	echo "<br>REMOTE_HOST " . $_SERVER["REMOTE_HOST"];
				echo "<br>REMOTE_PORT " . $_SERVER["REMOTE_PORT"];
			#	echo "<br>REMOTE_USER " . $_SERVER["REMOTE_USER"];
			#	echo "<br>HTTP_CLIENT_IP " . $_SERVER['HTTP_CLIENT_IP'];
			#	echo "<br>hi ";
			#	echo "<br>HTTP_X_FORWARDED_FOR " . $_SERVER['HTTP_X_FORWARDED_FOR'];
				echo "<br>Country: " . $json['country'];
				echo "<br>Region: " . $json['region'];
				echo "<br>City: " . $json['city'];
			?>
		</div>
	</body> 
</html>
 