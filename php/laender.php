<?php
	error_reporting(E_ERROR);
	
	//DO GET ALL SUBJECTS
	$abfrage = "SELECT * FROM laender";
	$ergebnis = mysql_query($abfrage);
	$laender = array();
	
	while($row = mysql_fetch_object($ergebnis)){
		$laender[] = $row;
	}	

	
	
?>