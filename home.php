<!DOCTYPE html>

<?php
	session_start();
?>

<html>
	<head>
		<link rel="stylesheet" href="style_home.css" type="text/css">
		<link rel="stylesheet" href="style_footer.css" type="text/css">
		<link rel="stylesheet" href="style_head.css" type="text/css">		
		<link rel="shortcut icon" href="Bilder/BrowserIcon.png" type="x-icon">
		<meta="viewport" content="width=device-width">
		<title>Schule wird Staat | Startseite</title>
		<meta charset ="utf-8">
		<script src="jquery.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.menubutton').click(function() {
					$('nav').slideToggle('slow');
				});
			});
		</script>
	</head>	
	<body>
		<div id="wrapper">
			<?php include 'includes/headliner.php'; ?>
			<div class="all">
			
					<!--<div class="startboxen twou" >
						<a href="twoutree.php"><br><h5>2u Lieferservice</h5></a>
						<div class="desc">Du willst irgendetwas aus dem Staat kaufen, aber bist zu faul es dir zu holen? 2u ist die Lösung. Einfach via dm kontaktieren.</div>
					</div>-->
					
					<div class="startboxen" >
						<a href="wiki_home.php"><br><h5>Wiki</h5></a>
						<div class="desc">Hier kannst du dich über alle Rollen, welche während dem Projekt "Schule wird Staat" zur Verfügung stehen, informieren.</div>
					</div>
					
					<div class="startboxen">
						<a <!--href="../banking"--> class="startboxlink"><br><h5>Banksystem - Nicht mehr verfügbar</h5></a>
						<div class="desc">Hier kannst du deinen Kontostand überwachen, Geld einzahlen und abheben.</div>
					</div>
					
					<?php
					#initialisieren
					include 'includes/define_con.php';
					$lagerpage = false;
					
					#sql
					$a_u_lgr = $con->prepare("SELECT Bänker, Lageradmin FROM user3 WHERE email=?");
					$a_u_lgr->bind_param("s", $_COOKIE["user"]);
					if(isset($_COOKIE["user"])) {
						#more sql
						$a_u_lgr->execute();
						$a_u_lgr->bind_result($r_u_lgr1, $r_u_lgr2);
						while($a_u_lgr->fetch()) {
							if($r_u_lgr1 == true or $r_u_lgr2 == true) {
								$lagerpage = true;
							}
						}
						#verarbeiten und output
						if($lagerpage == true) {
							echo '<div class="startboxen">
								<a href="lager_home.php" class="startboxlink"><br><h5>Lagersystem</h5></a>
								<div class="desc">Hier  kann das Lager eingesehen und verwaltet werden. Begrenzter Zugriff.</div>
							</div>';
						}
					}
					?>
					
					<div class="startboxen">
						<a href="Wirtschaftstartpage.php" class="startboxlink">
						<br><h5>Unternehmen</h5></a>
						<div class="desc">Hier kannst du ein Unternehmen gründen und verwalten.</div>
					</div>
					
					<div class="startboxen">
						<a href="Regierungsstartpage.php"><br><h5>Regierung</h5></a>
						<div class="desc">Wenn du ein Politiker bist kannst du hier eine Partei gründen und verwalten. Bürger können hier Mitglieder einer Partei werden.</div>
					</div>
					
					<div class="startboxen">
						<a><br><h5>Und mehr...</h5></a>
						<div class="desc">Es folgen mehr startboxen, und mehr Zugriffe, mehr Webseiten, verschiedenes. Rollenzugriffe, Register u.Ä.</div>
					</div>
			</div>
			<?php
				if(!isset($_COOKIE["cookies"])) {
					echo '	<div id="pop-up">
								<button id="close" onclick=document.getElementById("pop-up").style.display="none">X</button>
								<p class="Keks">Cookies helfen uns bei der Bereitstellung unserer Dienste. Durch die Nutzung unserer Website erklären Sie sich damit einverstanden, dass wir Cookies setzen.</p>
							</div>';
					setcookie("cookies", 1, time() + 86400*31, "/");
				}
			?>
			
			<?php include 'includes/footliner.php'; ?>
		</div>
	</body> 
</html>
 