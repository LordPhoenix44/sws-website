<?php 
	$n_p = "";

	
	
	function a_n_partei($part_id) {
		#Initialisieren einer Abfrage
		include "includes/define_con.php";
					
		#SQL Abfrage anch parteiname
		$sql = $con->prepare("SELECT Name FROM parteien WHERE ID=?");
		$sql->bind_param("i", $part_id);
		$sql->execute();
		$sql->bind_result($res_n_partei);
		while ($sql->fetch()) {
			$n_p = $res_n_partei;
		}
		if(isset($n_p)) {
			$_SESSION["n_p"] = $n_p;
		} else {
			$_SESSION["n_p"] = "Hier könnte deine Partei stehen";
		}
	}
?>