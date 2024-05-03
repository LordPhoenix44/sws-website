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
						<a href="https://www.instagram.com/2u_lieferservice_kruzien/"><br><h5>Instagram</h5></a>
						<div class="desc">Kontaktiere uns in einer Insta-dm</div>
					</div>
					
					<div class="startboxen">
						<a href="https://web.yammer.com/main/groups/eyJfdHlwZSI6Ikdyb3VwIiwiaWQiOiI3MjEyNTQzMTgwOCJ9/all" class="startboxlink"><br><h5>Yammer</h5></a>
						<div class="desc">Schreibe uns auf Yammer an.</div>
					</div>
			</div>
			<?php include 'includes/footliner.php'; ?>
		</div>
	</body> 
</html>
 