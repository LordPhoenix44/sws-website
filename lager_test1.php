<!DOCTYPE html>
	<?php
		include 'includes/define_con.php';
		session_start();
		
	?>
	<html>
		<head>
			<link rel="stylesheet" href="style_db1.css" type="text/css">
			<link rel="shortcut icon" href="Bilder/BrowserIcon.png" type="x-icon">
			<title>Schule wird Staat | Lagerartikel</title>
			<meta charset = "utf-8">
		</head>
		
		<body id="main">
			<a class="zurück" href="lager_liste.php">zurück</a>
			<div class="para">
				<?php
					#Initialisieren
					$lr = false;
					$r_KN = "";
					$r_verf = 0;
					$r_need = 0;
					$r_rlp = 0.00;
					$r_rpp = 0.00;
					$r_hera = 0;
					$r_hverf = 0;
					$r_hneed = 0;
					$verf_res = 0;
					if(isset($_POST["clickedon"]) and isset($_POST["nclickedon"]) and isset($_POST["kclickedon"])) {
						$_SESSION["active_li_stuff"] = $_POST["clickedon"];
						$_SESSION["nactive_li_stuff"] = $_POST["nclickedon"];
						$_SESSION["kactive_li_stuff"] = $_POST["kclickedon"];
					}
					$i_s_verf = $con->prepare("UPDATE stuff SET Verfügbar=? WHERE KN=?");
					$i_s_verf->bind_param("ds", $_POST["anzahl"], $_SESSION["kactive_li_stuff"]);
					if(isset($_POST["anzahl"])) {
						$i_s_verf->execute();
					}
					$i_s_rlp = $con->prepare("UPDATE stuff SET RLpreis=? WHERE KN=?");
					$i_s_rlp->bind_param("ds", $_POST["RLP"], $_SESSION["kactive_li_stuff"]);
					if(isset($_POST["RLP"])) {
						$i_s_rlp->execute();
					}
					$i_s_rpp = $con->prepare("UPDATE stuff SET RPpreis=? WHERE KN=?");
					$i_s_rpp->bind_param("ds", $_POST["RPP"], $_SESSION["kactive_li_stuff"]);
					if(isset($_POST["RPP"])) {
						$i_s_rpp->execute();
					}
					$i_s_angef = $con->prepare("UPDATE stuff SET `stuff`.`Nachfrage` = `stuff`.`Nachfrage` + ? WHERE KN=?");
					$i_s_angef->bind_param("ds", $_POST["angef"], $_SESSION["kactive_li_stuff"]);
					if(isset($_POST["angef"])) {
						$i_s_angef->execute();
					}
					$i_s_angef2 = $con->prepare("UPDATE stuff SET `stuff`.`Nachfrage` = ? WHERE KN=?");
					$i_s_angef2->bind_param("ds", $_POST["s_ang"], $_SESSION["kactive_li_stuff"]);
					if(isset($_POST["s_ang"])) {
						$i_s_angef2->execute();
					}
					
					#Herausgebung
					$i_s_heraus1 = $con->prepare("UPDATE stuff SET `stuff`.`Herausgegeben` = `stuff`.`Herausgegeben` + ? WHERE KN=?");
					$i_s_heraus1->bind_param("ds", $_POST["s_her"], $_SESSION["kactive_li_stuff"]);
					if(isset($_POST["s_her"])) {
						$i_s_heraus1->execute();
					}
					$i_s_heraus2 = $con->prepare("SELECT Verfügbar, Nachfrage FROM stuff  WHERE KN=?");
					$i_s_heraus2->bind_param("s", $_SESSION["kactive_li_stuff"]);
					if(isset($_POST["s_her"])) {
						$i_s_heraus2->execute();
						$i_s_heraus2->bind_result($r_s_hverf, $r_s_hneed);
						while($i_s_heraus2->fetch()) {
							$r_hverf = $r_s_hverf;
							$r_hneed = $r_s_hneed;
						}
					}
					if(isset($_POST["s_her"])) {
						$need_res = $r_hneed - $_POST["s_her"];
						if($need_res < 0) {
							$need_res = 0;
						}
					}
					$i_s_heraus3 = $con->prepare("UPDATE stuff SET `stuff`.`Verfügbar` = `stuff`.`Verfügbar` - ? WHERE KN=?");
					$i_s_heraus3->bind_param("ds", $_POST["s_her"], $_SESSION["kactive_li_stuff"]);
					if(isset($_POST["s_her"])) {
						$i_s_heraus3->execute();
					}
					$i_s_heraus4 = $con->prepare("UPDATE stuff SET `stuff`.`Nachfrage` = ? WHERE KN=?");
					$i_s_heraus4->bind_param("ds", $need_res, $_SESSION["kactive_li_stuff"]);
					if(isset($_POST["s_her"])) {
						$i_s_heraus4->execute();
					}
				?>
			</div>
			
			
			<?php /*Form zum Außfüllen*/?>
			<div class="echo">
				<?php
					echo "<h4>" . $_SESSION["active_li_stuff"] . ".) ";
					echo $_SESSION["nactive_li_stuff"] . "</h4>";
					
					$a_s_all = $con->prepare("SELECT KN, Verfügbar, Nachfrage, RLpreis, RPpreis, Herausgegeben FROM stuff WHERE KN=?");
					$a_s_all->bind_param("s", $_SESSION["kactive_li_stuff"]);
					$a_s_all->execute();
					$a_s_all->bind_result($r_s_KN, $r_s_verf, $r_s_need, $r_s_rlp, $r_s_rpp, $r_s_hera);
					while($a_s_all->fetch()) {
						$r_KN = $r_s_KN;
						$r_verf = $r_s_verf;
						$r_need = $r_s_need;
						$r_rlp = $r_s_rlp;
						$r_rpp = $r_s_rpp;
						$r_hera = $r_s_hera;
					}
				?>
					<p>Kenn- Nummer: <?php echo $r_KN; ?></p>
					<p>Bestand: <?php echo $r_verf; ?> Stück</p>
					<p>Angefordert: <?php echo $r_need; ?> Stück</p>
					<p>Bereits Herausgegeben: <?php echo $r_hera; ?> Stück</p>
					 
					<input type=radio name=w id=sh1 style=position:absolute;visibility:hidden; checked> <!-- Ich habe in der Style_db1.css ein paar zeilen geschrieben -->
					<input type=radio name=w id=sh2 style=position:absolute;visibility:hidden;>
					<label id=show_request for=sh2><a>Mehr anfordern?</a></label>
					<div class=anfordern>
						<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method=post class=gesform>
							<p class=inplabel>Anzahl der noch Benötigten Exemplare:</p>
								<input type=number min=0 step=1 name=angef class=tstinp>
							<input type=submit class=btn>
						</form>
					</div>
					<p>Preis im echten Leben: <?php echo $r_rlp . "€"; ?></p>
					<p>Preis im Rollenspiel: <?php echo $r_rpp . "₭"; ?></p>
					<input type=radio name=w2 id=sh3 style=position:absolute;visibility:hidden; <?php if(!isset($_POST["rechner"])) {echo "checked";} ?>>
					<input type=radio name=w2 id=sh4 style=position:absolute;visibility:hidden;>
					<label id=show_rechner for=sh4><a>Preisrechner:</a></label>
					<div class=rechner>
						<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method=post class=gesform>
							<p class=inplabel>Anzahl der Exemplare:</p>
								<input type=number min=0 step=1 name=count class=tstinp <?php if(isset($_POST["count"])) {echo "value=" . $_POST["count"];} ?>>
							<p class=inplabel>Preis:</p>
								<input type="radio" name="preis" value="RL" id="rlp" <?php if(isset($_POST["preis"])) {if($_POST["preis"] == "RL") {echo "checked";}} ?>>
								<label for="rlp" class="inplabel">Echtes Leben</label>
								<br><input type="radio" name="preis" value="RP" id="rpp" <?php if($_POST["preis"] == "RP") {echo "checked";} ?>>
								<label for="rpp" class="inplabel">Rollenspiel</label>
							<input type=hidden name=rechner value=1>
							<br><br><input type=submit class=btn value=Ausrechnen>
						</form>
						<?php
							echo "<p>";
							$r_preis = 0.00;
							if(isset($_POST["count"]) and isset($_POST["preis"])) {
								if($_POST["preis"] == "RL") {
									$r_preis = $_POST["count"] * $r_rlp;
									echo $r_preis . "€";
								} elseif($_POST["preis"] == "RP") {
									$r_preis = $_POST["count"] * $r_rpp;
									echo $r_preis . "₭";
								} else {
									echo "Hmm... Irgendetwas stimmt nicht.";
								}
							}
							echo "</p>";
						?>
					</div>
					
				<?php
				#Adminsegment
				$a_u_lr = $con->prepare("SELECT Lageradmin, Bänker FROM user3 WHERE email=?");
				$a_u_lr->bind_param("s", $_COOKIE["user"]);
				$a_u_lr->execute();
				$a_u_lr->bind_result($r_u_lr1, $r_u_lr2);
				while($a_u_lr->fetch()) {
					if($r_u_lr1 == 1) {
						$lr = true;
					}
				}
				if($lr == true) {
					echo "<br><div class=balken></div>"; #Hier bitte einen Schöenen Balken draus machen
				} else {
					exit();
				}
				?> 
					<input type=radio name=w3 id=sh5 style=position:absolute;visibility:hidden; checked>
					<input type=radio name=w3 id=sh6 style=position:absolute;visibility:hidden;>
					<br><label id=show_db for=sh6><a>Bestand Anpassen</a></label>
					<div class=setcount>
						<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method=post class=gesform>
							<p class=inplabel>Genaue Anzahl an Exemplaren:</p>
								<input type=number min=0 step=1 name=anzahl class=tstinp>
							<input type=submit class=submit>
						</form>
					</div>
					
					<input type=radio name=w4 id=sh7 style=position:absolute;visibility:hidden; checked>
					<input type=radio name=w4 id=sh8 style=position:absolute;visibility:hidden;>
					<br><label id=show_rlp for=sh8><a>Echtpreis Anpassen</a></label>
					<div class=setrlp>
						<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method=post class=gesform>
							<p class=inplabel>Neuer Preis in Euro (Ohne Eurozeichen):</p>
								<input type=number min=0 max=255 name=RLP class=tstinp step=0.01>
							<input type=submit class=submit>
						</form>
					</div>
					
					<input type=radio name=w5 id=sh9 style=position:absolute;visibility:hidden; checked>
					<input type=radio name=w5 id=sh10 style=position:absolute;visibility:hidden;>
					<br><label id=show_rpp for=sh10><a>Preis im Rollenspiel Anpassen</a></label>
					<div class=setrpp>
						<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method=post class=gesform>
							<p class=inplabel>Neuer Preis in ₭:</p>
								<input type=number min=0 max=255 name=RPP class=tstinp step=0.01>
							<input type=submit class=submit>
						</form>
					</div>
					<input type=radio name=w6 id=sh11 style=position:absolute;visibility:hidden; checked>
					<input type=radio name=w6 id=sh12 style=position:absolute;visibility:hidden;>
					<br><label id=show_ang for=sh12><a>Anzahl angeforderter Objekte ändern</a></label>
					<div class=setang>
						<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method=post class=gesform>
							<p class=inplabel>Anzahl der noch Angeforderten Objekte:</p>
								<input type=number min=0 step=1 name=s_ang class=tstinp>
							<input type=submit class=submit>
						</form>
					</div>
					<input type=radio name=w7 id=sh13 style=position:absolute;visibility:hidden; checked>
					<input type=radio name=w7 id=sh14 style=position:absolute;visibility:hidden;>
					<br><label id=show_her for=sh14><a>Herausgebung Eintragen</a></label>
					<div class=sether>
						<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method=post class=gesform>
							<p class=inplabel>Anzahl der herausgegebenen Objekte:</p>
								<input type=number min=0 step=1 name=s_her class=tstinp>
							<input type=submit class=submit>
						</form>
					</div>
					<br><a href="redirections/stuff_del.php" style=text-decoration:none;>Gegenstand aus der Liste löschen</a>
					<?php
						#echo "<p>nactive_li_stuff: " . $_SESSION["nactive_li_stuff"] . "</p><br><p>active_li_stuff: " . $_SESSION["active_li_stuff"] . "</p>";
					?>
				<?php
					if($lr != true) {
						echo "-->";
					}
				?>
			</div>
		</body>
	</html>