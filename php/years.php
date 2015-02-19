<?php
	error_reporting(E_ERROR);
	
	//DO GET ALL SUBJECTS
	$abfrage = "SELECT * FROM years";
	$ergebnis = mysql_query($abfrage);
	$years = array();
	
	while($row = mysql_fetch_object($ergebnis)){
		$years[] = $row;
	}	

	
	
?>