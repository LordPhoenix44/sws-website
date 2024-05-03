<!DOCTYPE html>

<html>
	<?php

		#Initialisieren der MySQL verbindung
		include '../includes/define_con.php';
		#Update user3
		$p_leave = $con->prepare("CREATE TABLE `klproto2`.`unternehmenen` ( `ID` INT(20) UNSIGNED NOT NULL AUTO_INCREMENT , `Name` VARCHAR(255) NOT NULL , `CEO` VARCHAR(255) NOT NULL , `Publicitym` VARCHAR(255) NULL DEFAULT NULL , PRIMARY KEY (`ID`), UNIQUE (`Name`), UNIQUE (`CEO`)) ENGINE = InnoDB;");
		$p_leave->execute();

		#Verlassen des Skriptes
		header('Location: ' . '../home.php');
	?>
</html>