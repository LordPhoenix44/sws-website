<!DOCTYPE html>
<?php
	include("define_con.php");
	#sql
	$a_u_lgr = $con->prepare("SELECT Lageradmin FROM user3 WHERE email=?");
	$a_u_lgr->bind_param("s", $_COOKIE["user"]);
	if(isset($_COOKIE["user"])) {
		#more sql
		$a_u_lgr->execute();
		$a_u_lgr->bind_result($r_u_lgr);
		while($a_u_lgr->fetch()) {
			if($r_u_lgr != 1) {
				exit();
			}
		}
	}
?>

<html>
	<head>
		<title>Encoder-NSFS</title>
		<meta charset ="utf-8">
		<link rel="stylesheet" href="../style_db1.css" type="text/css">
	</head>	
	<body>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<input type="checkbox" name="rpol" value="1" id="pol">
			<label for="pol" class="inplabel">Politiker</label><br><br>
			<input type="checkbox" name="rban" value="1" id="ban">
			<label for="ban" class="inplabel">Bänker</label><br><br>
			<input type="checkbox" name="rceo" value="1" id="ceo">
			<label for="ceo" class="inplabel">Unternehmer</label><br><br><br>
			<input type="submit" class="btn">
		</form>
		<div id="wrapper">
			<?php
				$vpol = 0;
				$vban = 0;
				$vceo = 0;
				if(isset($_POST['rpol'])) {$vpol = 1;}
				if(isset($_POST['rban'])) {$vban = 1;}
				if(isset($_POST['rceo'])) {$vceo = 1;}
				echo $vpol . $vban . $vceo . "<br><br>";
				
				function random_letter() {
					return substr(sha1(mt_rand()), 0, 1);
				}
				
				$letter1 = random_letter();
				$letter2 = random_letter();
				$letter3 = random_letter();
				$letter4 = random_letter();
				$letter5 = random_letter();
				$letter6 = random_letter();
				$letter7 = random_letter();
				$letter8 = random_letter();
				$letter9 = random_letter();
				
				#Bänker auth
				if($vban == 1) {
					#Letter2
					$randind2 = random_int(1, 2);
					if($randind2 == 1) {$letter2 = "b";}
					if($randind2 == 2) {$letter2 = "2";}
					#Letter9
					$randind9 = random_int(1, 2);
					if($randind9 == 1) {$letter9 = "b";}
					if($randind9 == 2) {$letter9 = "2";}
				}
				#CEO auth
				if($vceo == 1) {
					#Letter3
					$randind3 = random_int(1, 2);
					if($randind3 == 1) {$letter3 = "7";}
					if($randind3 == 2) {$letter3 = "1";}
					#Letter8
					$randind8 = random_int(1, 2);
					if($randind8 == 1) {$letter8 = "7";}
					if($randind8 == 2) {$letter8 = "1";}
				}
				#Politik auth
				if($vpol == 1) {
					#Letter6
					$randind6 = random_int(1, 2);
					if($randind6 == 1) {$letter6 = "a";}
					if($randind6 == 2) {$letter6 = "9";}
					#Letter7
					$randind7 = random_int(1, 2);
					if($randind7 == 1) {$letter7 = "a";}
					if($randind7 == 2) {$letter7 = "9";}
				}
				
				#echo $letter1 . $letter2 . $letter3 . $letter4 . $letter5 . $letter6 . $letter7 . $letter8 . $letter9 . "<br><br>";
				$code1 = $letter1 . $letter2 . $letter3 . $letter4 . $letter5 . $letter6 . $letter7 . $letter8 . $letter9;
				$code = strtoupper($code1);
				echo $code;
			?>
		</div>
	</body> 
</html>
 