<!DOCTYPE html>

<?php
	session_start();
?>

<html>
	<head>
		<link rel="stylesheet" href="style_lager_home.css" type="text/css">
		<link rel="stylesheet" href="style_footer.css" type="text/css">
		<link rel="stylesheet" href="style_head.css" type="text/css">
		<link rel="shortcut icon" href="Bilder/BrowserIcon.png" type="x-icon">
		<meta="viewport" content="width=device-width">
		<title>Schule wird Staat | Lager</title>
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
					<div class="startboxen" >
						<a href="lager_liste.php"><br><h5>Lager</h5></a>
						<div class="desc">Überwache die Lagerfüllstände</div>
					</div>
					
					<div class="startboxen">
						<a href="lager_add.php" class="startboxlink"><br><h5>Füge dem Lager Gegenstände hinzu.</h5></a>
						<div class="desc">Diese Funktion ist nur dem Lageradmin vorbehalten.</div>
					</div>
			</div>
			<?php include 'includes/footliner.php'; ?>
		</div>
	</body> 
</html>
 