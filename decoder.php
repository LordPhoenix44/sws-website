<!DOCTYPE html>
<?php
	include("includes/define_con.php");
	#sql
	if(!isset($_COOKIE["user"])) {
		exit();
	}
?>

<html>
	<head>
		<title>Schule wird Staat | Code</title>
		<meta charset ="utf-8">
		<link rel="stylesheet" href="styleforms.css" type="text/css">
	</head>	
	<body>
		<div class="login-box">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<div class="textbox">
					<input type="text" name="code" placeholder="Code" required>
				</div>
				<input type="submit" class="btn">
				<a href="home.php"><button type="button" class="btn">Zurück zur Startseite</button></a>
			</form>
		</div>
		<div id="wrapper">
			<?php
				$code0 = $_POST["code"];
				$code1 = str_split($code0, 1);
				#read out politic
				$accP = 0;
				$codeP = $code1[5] . $code1[6];
				switch($codeP) {
					case "AA":
						$accP = 1;
						break;
					case "A9":
						$accP = 1;
						break;
					case "9A":
						$accP = 1;
						break;
					case "99":
						$accP = 1;
						break;
				}
				#echo "<br>P $codeP $accP";
				#read out bank
				$accB = 0;
				$codeB = $code1[1] . $code1[8];
				switch($codeB) {
					case "BB":
						$accB = 1;
						break;
					case "B2":
						$accB = 1;
						break;
					case "2B":
						$accB = 1;
						break;
					case "22":
						$accB = 1;
						break;
				}
				#echo "<br>B $codeB $accB";
				#read out ceo
				$accC = 0;
				$codeC = $code1[2] . $code1[7];
				switch($codeC) {
					case "11":
						$accC = 1;
						break;
					case "17":
						$accC = 1;
						break;
					case "71":
						$accC = 1;
						break;
					case "77":
						$accC = 1;
						break;
				}
				
				$c_u = "";
				$sql = $con->prepare("SELECT Used FROM Codes WHERE Used=?");
		 		$sql->bind_param("s", $_POST["code"]);
				$sql->execute();
				$sql->bind_result($res_c_used);
				while ($sql->fetch()) {
					$c_u = $res_c_used;
				}
				
				#echo "<br>C $codeC $accC";
				#Set All
				$s_u_rig = $con->prepare("UPDATE user3 SET Politiker=?, Bänker=?, Unternehmer=? WHERE email=?");
				$s_u_rig->bind_param("iiis", $accP, $accB, $accC, $_COOKIE["user"]);
				if(strlen($c_u) == 0) {
					$s_u_rig->execute();
				}
				
				#Output
				$appl_rig = "Folgende Rechte wurden hinzugefügt:";
				if($accP == 1) {$appl_rig .= "<br>- Politiker-Rechte"; }
				if($accB == 1) {$appl_rig .= "<br>- Bänker-Rechte"; }
				if($accC == 1) {$appl_rig .= "<br>- Unternehmer-Rechte"; }
				if(isset($_POST["code"]) and strlen($c_u) == 0) {
					echo "<style>.btn {border: 2px solid #5FB404;}
					.textbox input {border-bottom: 2px solid #5FB404;}</style>";
				}
				
				$s_c_use = $con->prepare("INSERT INTO Codes (Used) VALUES (?)");
				$s_c_use->bind_param("s", $_POST["code"]);
				$s_c_use->execute();
			?>
		</div>
	</body> 
</html>
 