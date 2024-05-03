<?php 
	$n_b = "";
	
	function a_n_business($busi_id) {
		#Initialisieren einer Abfrage
		include 'includes/define_con.php';
					
		#SQL Abfrage anch parteiname
		$sql = $con->prepare("SELECT Name FROM unternehmen WHERE ID=?");
		$sql->bind_param("i", $busi_id);
		$sql->execute();
		$sql->bind_result($res_n_business);
		while ($sql->fetch()) {
			$n_b = $res_n_business;
		}
		if(isset($n_b)) {
			$_SESSION["n_b"] = $n_b;
		} else {
			$_SESSION["n_b"] = "Hier könnte dein Unternehmen stehen";
		}
	}
?>