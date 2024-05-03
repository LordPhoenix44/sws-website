<!DOCTYPE html>

<html>
	<head>
		<title>Verteidigung P 02</title>
		<meta charset ="utf-8">
		<link rel="stylesheet" href="styleX.css" type="text/css">
	</head>	
	<body>
		<div id="wrapper">
			<p>“PHP ([...] für „PHP: Hypertext Preprocessor“, ursprünglich „Personal Home Page Tools“) ist eine Skriptsprache mit einer an C und Perl angelehnten Syntax, die hauptsächlich zur Erstellung dynamischer Webseiten oder Webanwendungen verwendet wird.[11] PHP wird als freie Software […] verbreitet. PHP zeichnet sich durch breite Datenbankunterstützung[12] [..] sowie die Verfügbarkeit zahlreicher Funktionsbibliotheken[13] aus.” ~ de.wikipedia.org </p>
			<p>“PHP ([...] für PHP: Hypertext Preprocessor) ist eine weit verbreitete und für den allgemeinen Gebrauch bestimmte Open-Source-Skriptsprache, welche speziell für die Webprogrammierung geeignet ist und in HTML eingebettet werden kann.” ~ php.net </p>
			<p>“Abk. für PHP Hypertext Preprocessor (ursprünglich: Private Home Page); freie Skriptsprache zur serverseitigen Erzeugung dynamischer Inhalte im World Wide Web.” ~ wirtschaftslexikon.gabler.de </p>
			<a href="Page03.php" class="weg"><p>Nächste Seite</p></a>
		</div>
		<aside id="code">
			<?php
				echo htmlspecialchars('<p>(Definition Wikipedia)</p><p>(Definition php.net)</p><p>(Definition gabler.de)</p>');
				echo '<br>  ' . htmlspecialchars('<a href="Page03.php" class="weg"><p>Nächste Seite</p></a>');
			?>
		</aside>
		
	</body>
</html>
 