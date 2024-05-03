<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" href="style_parteien_unterseiten.css" type="text/css">
			<link rel="stylesheet" href="style_db1.css" type="text/css">
			<link rel="shortcut icon" href="Bilder/BrowserIcon.png" type="x-icon">
			<title>Schule wird Staat | Lager erweitern</title>
			<meta charset ="utf-8">
		</head>
		
		<body id="main">
			<div class="pos">
				<a class="zurück" href="lager_home.php">zurück</a>
				</div>
			<div class="para">
				<?php
					#Funktionen und Variablen Festlegen
					include 'includes/define_con.php';
				?>
			</div>
			<div class="echo">
				<p>An Bänker: Bei Kenn-Nummer könnt ihr euch selbst etwas aussuchen, <br>bei Anzahl der Verfügbaren Exemplare, Und den Preisen bitte 0 eingeben, <br> und Kategorie und Name bitte passend wählen.</p>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="gesform">
					<p>Name des Neuen Gegenstandes:</p> <input type="text" name="namet" class="tstinp" required><br>
					<p>Kenn-Nummer: (Buchstaben & Zahlen)</p> <input type="text" name="knt" class="tstinp" required><br>
					<p>Anzahl der Verfügbaren Exemplare:</p> <input type="number" min="0" name="verft" class="tstinp" step="1" required><br>
					<p>Anzahl der angefragten Exemplare (Optional):</p> <input type="number" min="0" step="1" name="angft" class="tstinp"><br>
					<p>Einzelpreis im Echten Leben (in Euro):</p> <input type="number" min="0" max="50" step="0.01" name="prcrlt" class="tstinp" required><br>
					<p>Einzelpreis im Rollenspiel (in ₭):</p> <input type="number" min="0" max="50" step="0.01" name="prcrpt" class="tstinp" required><br>
					<p>Kategorie des Gegenstandes:</p><br>
						<input type="radio" name="Art" value="Essen" id="food">
						<label for="food" class="inplabel">Essen</label><br><br>
						<input type="radio" name="Art" value="Sport und Unterhaltung" id="sport">
						<label for="sport" class="inplabel">Sport und Unterhaltung</label><br><br>
						<input type="radio" name="Art" value="Sonstige" id="else">
						<label for="else" class="inplabel">Etwas anderes</label><br><br><br>
					<br><input type="submit" class="btn">
				</form><br><br><br><br><br>
				
				<div>
					<?php
						$sql = $con->prepare("INSERT INTO stuff (Name, KN, Verfügbar, Nachfrage, RLpreis, RPpreis, Kategorie, Herausgegeben) VALUES (?, ?, ?, 0, ?, ?, ?, 0)");
						$sql->bind_param("ssddds", $_POST["namet"], $_POST["knt"], $_POST["verft"], $_POST["prcrlt"], $_POST["prcrpt"], $_POST["Art"]);
						$sql2 = $con->prepare("UPDATE stuff SET Nachfrage=? WHERE Name=?");
						$sql2->bind_param("ds", $_POST["angft"], $_POST["namet"]);
						if(isset($_POST["namet"]) and isset($_POST["knt"]) and isset($_POST["verft"]) and isset($_POST["prcrlt"]) and isset($_POST["prcrpt"]) and isset($_POST["Art"])) {
							$sql->execute();
							echo "<p class=texalicenter>Das hat geklappt</p>";
						} else {
							echo "<p class=texalicenter>Bitte tragt alles korrekt ein!</p>";
						}
						if(isset($_POST["angft"])) {
							$sql2->execute();
						}
					?>
				</div>
			</div>
			
		</body>
	</html>
	